@if (session()->has('message'))
    <div  x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show" class="fixed top-10 left-10 bg-green-500 rounded-lg p-3">
     {{ session('message') }}</div>
@endif
