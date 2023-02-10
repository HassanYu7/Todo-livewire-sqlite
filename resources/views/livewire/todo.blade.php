  <div class="grid h-screen place-items-center">
    
      <div class="text-right ">


        <div class="container">

            <button class="btn btn-accent" wire:click="addItem">اضافة</button>

            <input type="text" placeholder=" اكتب المهام هنا .. "
            class="input input-bordered input-accent w-full max-w-xs mt-6" style="text-align: right; color:white"
            wire:model="todoText" wire:keydown.enter="addItem" />
        </div>


        <div class="py-3">
            @error('todoText')
            <div class="alert alert-warning shadow-lg">
                <div>
                    <svg 
                    xmlns="http://www.w3.org/2000/svg" 
                    fill="none"
                    viewBox="0 0 24 24" 
                    class="stroke-current flex-shrink-0 w-6 h-6">
                    <path 
                    stroke-linecap="round" 
              stroke-linejoin="round" 
              stroke-width="2" 
              d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
             </path></svg>
             <span class="error">يجب اضافة 5 احرف على الأقل</span>
            </div>
         </div>
         @enderror
        </div>
          <div class="py-6">
            
              @if (count($items) == 0)
                  <p class="text-white text-center text-2xl">
                      لايوجد مهام!
                  </p>
              @endif

              @foreach ($items as $item)
                  <div class="flex gap-4 justify-between items-center py-1 ">
                      <input type="checkbox" {{ $item->completed ? 'checked ' : ' ' }}
                          wire:change="toggleItem({{ $item->id }})" class="checkbox checkbox-success">

                      <label class="flex-1
                            {{ $item->completed ? 'line-through ' : ' ' }}">
                          {{ $item->todo }}
                      </label>

                      <button wire:click="deleteItem({{ $item->id }})">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                              stroke="#d16f6f" class="w-6 h-6">
                              <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                          </svg>
                      </button>

                  </div>
              @endforeach
          </div>
          
      </div>
  </div>


  <style>
    input['type=checkbox']{
        color: red;
    }
  </style>