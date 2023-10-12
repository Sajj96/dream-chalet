<div class="search-popup js-search-popup ">
    <a href="javascript:void(0);" class="close-button" id="search-close" aria-label="Close search">
        <i class="fa fa-close"></i>
    </a>
    <div class="popup-inner">
        <div class="inner-container">
            <form class="search-form" id="search-form" action="{{ route('property') }}">
                <h3>What Are You Looking for?</h3>
                <div class="search-form-box flex">
                    <input type="text" class="search-input" name="search" placeholder="Type a  Keyword...." id="search-input" aria-label="Type to search" role="searchbox" autocomplete="off">
                    <button type="submit" class="search-icon"><i class="bx bx-search"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>