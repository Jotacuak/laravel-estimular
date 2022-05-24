<div class="crud-form-button">

    @isset($route)
        <button type="button" id="store-button">
            <svg viewBox="0 0 24 24">
                <path fill="currentColor" d="M15,9H5V5H15M12,19A3,3 0 0,1 9,16A3,3 0 0,1 12,13A3,3 0 0,1 15,16A3,3 0 0,1 12,19M17,3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V7L17,3Z" />
            </svg>
        </button>
    @endisset

    @isset($create)
        <button type="button" id="create-button" data-url="{{route($route.'_create')}}">
            <svg viewBox="0 0 24 24">
                <path fill="currentColor" d="M12,6V9L16,5L12,1V4A8,8 0 0,0 4,12C4,13.57 4.46,15.03 5.24,16.26L6.7,14.8C6.25,13.97 6,13 6,12A6,6 0 0,1 12,6M18.76,7.74L17.3,9.2C17.74,10.04 18,11 18,12A6,6 0 0,1 12,18V15L8,19L12,23V20A8,8 0 0,0 20,12C20,10.43 19.54,8.97 18.76,7.74Z" />
            </svg>
        </button>
    @endisset

    @isset($visible)
        <div class="switch-container">
            <div class="onoffswitch">
                <input type="checkbox" name="visible" value="{{$visible == 1 ? 'true' : 'false'}}" {{$visible == 1 ? 'checked' : '' }} class="onoffswitch-checkbox" id="activebutton">
                <label class="onoffswitch-label" for="onoffswitch">
                    <span class="onoffswitch-inner"></span>
                    <span class="onoffswitch-switch"></span>
                </label>
            </div>
        </div>
    @endisset
</div>