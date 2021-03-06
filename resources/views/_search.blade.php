<div class="bg-searchcontainer font-oxygen flex justify-center p-3">
  <div class="flex items-center justify-between bg-white rounded-full w-3/4 md:w-1/2 lg:w-2/5 max-w-m h-10">
    <form class="flex items-center justify-between w-full" action="{{ route('stores.index') }}" method="GET">
      <div class="w-full">
        <input name="search" value="{{ request()->search }}" class="h-8 tracking-wider rounded-full w-full px-6 py-2 text-gray-700 focus:outline-none" id="search" type="text" placeholder="Search">
      </div>
      <div class="pr-2">
        <button type="submit" class="bg-btn-green text-white p-2 rounded-full hover:bg-darkblue focus:outline-none w-8 h-8 flex items-center justify-center">
          <svg class="text-white h-5 w-5 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
            <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
          </svg>
        </button>
      </div>
    </form>
  </div>
</div>