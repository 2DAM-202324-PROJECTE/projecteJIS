<!DOCTYPE html>
<html lang="ca" xmlns:livewire="">
@include("headComu")
<body class="antialiased">


<div>
    @livewire('header')

    <div class="bg-white mt-36">
        <livewire:cart-component />
    </div>

    @livewire('footer')
</div>



</body>
</html>
