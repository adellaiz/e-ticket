@extends('layouts.page')



@push('styles')
    <style type="text/tailwindcss">
        @layer utilities {
            body {
                background-color: #F9F9F9;
            }
            label {
                @apply relative cursor-text h-full block;
            }
            .my-input-selection:not(.active) .my-input-options {
                @apply hidden;
            }
            .my-input-options {
                @apply absolute top-14 border border-slate-300 flex-col left-0 bg-white min-w-full z-10;
            }
            .my-input-option {
                @apply px-2 hover:bg-slate-100 px-2 py-3 text-lg;
            }
            .my-input {
                @apply text-lg w-full h-fit placeholder:text-slate-700/50 px-4 py-4 rounded-md bg-white border border-slate-700
            }
            select.my-input {
                @apply block w-32;
            }
            label:not(.empty) {
                @apply text-slate-700;
            }
            label.empty > .my-input-label {
                @apply translate-x-1 translate-y-[-52%];
            }
            .my-input-label {
                @apply transform bg-white px-0.5 leading-none text-slate-700/50 absolute left-3 top-[50%] text-lg transition-all;
            }

            label:not(.empty) > .my-input-label {
                @apply -translate-x-2  -translate-y-10 text-base text-slate-700;
            }
            label:not(.empty) > .my-input:-internal-autofill-selected ~ .my-input-label {
                background: linear-gradient( #ffffff 0%, #ffffff 49.9%, rgb(232, 240, 254) 50.1%,  rgb(232, 240, 254) 100%) ;
            }

            .submit-button {
                @apply px-4 py-3 rounded text-center text-xl text-white bg-[#007697] lg:w-full w-[calc(100%-1rem)] font-semibold mt-4 lg:static fixed bottom-2 left-2;
            }
            .submit-button[disabled] {
                @apply bg-[#e9e9e9] text-[#a1a1a1]
            }
        }
    </style>
@endpush

@section('content')
    <form method="POST" id="my-form" class="container mx-auto py-12">
        @csrf
        <input type="hidden" value="{{$ticket->id}}" name="ticket_id">
        <div class="flex w-full relative mb-4 gap-5 px-4 py-4 text-xl text-center text-slate-700">
            <p class="font-bold">1. Pesan</p>
            &gt;
            <p>2. Bayar</p>
            &gt;
            <p>3. Selesai</p>
        </div>
        <div class="flex flex-col-reverse lg:flex-row gap-x-16 gap-y-4 flex-wrap justify-between">
            <div class="flex flex-col gap-6 w-full lg:w-1/2">
                @component('components.user-record', ['prefix' => 'customer_', 'label' => 'Detail Pemesan'])
                @endcomponent
                @for($i = 0; $i < $ticket->total_person; $i++)
                    @component('components.user-record', ['prefix' => 'visitors[' . $i . ']', 'label' => 'Detail Pengunjung'. ($ticket->total_person === 1? "": " " . ($i + 1))])
                    @endcomponent
                @endfor
            </div>
            <div class="lg:w-[400] xl:w-[500px] lg:sticky top-96">
                @component('components.ticket-information', ['ticket' => $ticket])
                @endcomponent
                    <button
                        disabled
                        type="submit"
                        class="submit-button"
                    >
                        Bayar
                    </button>
            </div>

        </div>
    </form>
@endsection

@push('scripts')
    <script>
        const checkForInputValues = function(){
            let isAllFilled = Array.from(document.querySelectorAll(".my-input[name]")).map(input => {
                return input.value;
            }).every(v => !!v);
            if(isAllFilled){
                document.querySelector('.submit-button').disabled = false;
            } else {
                document.querySelector('.submit-button').disabled = true;
            }
        }
        document.querySelectorAll('.my-input:not([data-toggle-select])').forEach((element) => {
            element.addEventListener('input', function(e){
                checkForInputValues()
                let value = e.target.value;
                if(value){
                    element.parentElement.classList.remove('empty')
                }
            });
            element.addEventListener('change', function(e){
                checkForInputValues()
                let value = e.target.value;
                if(value){
                    element.parentElement.classList.remove('empty')
                }
            });
            element.addEventListener('focusin', function(e){
                element.parentElement.classList.remove('empty');
            });
            element.addEventListener('focusout', function(e){
                let value = e.target.value;
                if(value){
                    element.parentElement.classList.remove('empty')
                } else {
                    element.parentElement.classList.add('empty')
                }
            });
        });
        document.querySelectorAll('.my-input[data-toggle-select]').forEach((element) => {
            document.addEventListener('click', function(e){
                let data = element.dataset['toggleSelect'];
                let baseEl = document.querySelector(`[data-select-id="${data}"]`);
                let labelEl = document.querySelector(`[data-select-id="${data}"] label`);
                let hiddenEl = document.getElementById('hidden_' + data);

                if(baseEl && e.path.includes(baseEl)){
                    baseEl.classList.add('active');
                    labelEl.classList.remove('empty');
                } else if(baseEl){
                    baseEl.classList.remove('active');
                    if(!hiddenEl.value){
                        labelEl.classList.add('empty');
                    }
                }
                let optionsEl = document.querySelectorAll(`[data-target-select="${data}"] [data-value]`);
                optionsEl.forEach(el => {
                    if(e.path.includes(el)){
                        document.getElementById('hidden_' + data).value = el.dataset.value;
                        baseEl.classList.remove('active');
                        if(!el.dataset.value){
                            labelEl.classList.add('empty');
                            document.getElementById(data).value = '';
                        } else {
                            document.getElementById(data).value = el.innerText;
                        }
                    }
                });
            });
        });
    </script>
@endpush
