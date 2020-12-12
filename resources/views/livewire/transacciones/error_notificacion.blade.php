</div>
<!-- component -->
<!-- Toast Container -->
<!-- put taost notification in here , to cope when the toast more than one -->
<div class="absolute right-0 top-0 m-5">

{{--    <!-- Toast Notification Info -->--}}
{{--    <div class="flex items-center bg-blue-400 border-l-4 border-blue-700 py-2 px-3 shadow-md mb-2">--}}
{{--        <!-- icons -->--}}
{{--        <div class="text-blue-500 rounded-full bg-white mr-3">--}}
{{--            <svg width="1.8em" height="1.8em" viewBox="0 0 16 16" class="bi bi-info" fill="currentColor" xmlns="http://www.w3.org/2000/svg">--}}
{{--                <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>--}}
{{--                <circle cx="8" cy="4.5" r="1"/>--}}
{{--            </svg>--}}
{{--        </div>--}}
{{--        <!-- message -->--}}
{{--        <div class="text-white max-w-xs ">--}}
{{--            ini pesan ketika ada informasi--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <!-- Toast Notification Warning -->--}}
{{--    <div class="flex items-center bg-orange-400 border-l-4 border-orange-700 py-2 px-3 shadow-md mb-2">--}}
{{--        <!-- icons -->--}}
{{--        <div class="text-orange-500 rounded-full bg-white mr-3">--}}
{{--            <svg width="1.8em" height="1.8em" viewBox="0 0 16 16" class="bi bi-exclamation" fill="currentColor" xmlns="http://www.w3.org/2000/svg">--}}
{{--                <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>--}}
{{--            </svg>--}}
{{--        </div>--}}
{{--        <!-- message -->--}}
{{--        <div class="text-white max-w-xs ">--}}
{{--            ini pesan ketika ada warning--}}
{{--        </div>--}}
{{--    </div>--}}

    <!-- Toast Notification Danger -->
    <div class="flex items-center mt-12 bg-red-500 border-l-4 border-red-700 py-2 px-3 shadow-md mb-2" >
        <!-- icons -->
        <div class="text-red-500 rounded-full bg-white mr-3">
            <svg width="1.8em" height="1.8em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"/>
                <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"/>
            </svg>
        </div>
        <!-- message -->
        @if (session()->has('error1'))
            <div class="alert alert-success">
                {{ session('error1') }}
            </div>
        @endif
        @if (session()->has('error2'))
            <div class="alert alert-success">
                {{ session('error2') }}
            </div>
        @endif
        @if (session()->has('error3'))
            <div class="alert alert-success">
                {{ session('error3') }}
            </div>
        @endif
    </div>
</div>
