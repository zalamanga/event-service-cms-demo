@extends('layouts.main')
@section('content')
    @include('components.section.hero')
    {{-- Scroll to top start --}}
    @include('widgets.toTop')
    {{-- Scroll to top end --}}

    {{-- What we do start --}}
    @include('components.section.wedo')
    {{-- What we do end --}}

    {{-- Our Packet start --}}
    @include('components.section.packet')
    {{-- Our Packet end --}}

    {{-- Our Tenda start --}}
    @include('components.section.tent')
    {{-- Our Tenda end --}}

    {{-- Our Make Up start --}}
    @include('components.section.makeUp')
    {{-- Our Make Up end --}}

    {{-- Our Accessories start --}}
    @include('components.section.accessories')
    {{-- Our Accessories end --}}

    {{-- Feedback start --}}
    @include('components.section.feedback')
    {{-- Feedback end --}}

    {{-- About start --}}
    @include('components.section.about')
    {{-- About end --}}
@endsection

@section('scripts')
    <script>
        $('.burger-btn').click(function() {
            $('.nav').addClass('show');
        })
        $('.btn-close').click(function() {
            $('.nav').removeClass('show');
        })

        $(window).on('scroll', function() {
            const myElement = $('nav');
            const pageOffset = window.pageYOffset;

            if (pageYOffset > 100) {
                $('#btnToTop').removeClass('d-none')
                myElement.removeClass('bg-transparent').addClass('bg-primary shadow-sm')
            } else {
                myElement.removeClass('bg-primary shadow-sm').addClass('bg-transparent')
                $('#btnToTop').addClass('d-none')
            }
        });
        $('#btn-contact').on('click', function() {
            const url = new URL(
                'https://wa.me/085156056381?text=Halo%2C%20saya%20ingin%20bertanya%20mengenai%20wedding%20organizer.'
                )
            window.location.href = url;
            console.log('first')
        })
    </script>
@endsection