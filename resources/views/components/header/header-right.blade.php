<div class="nav-right col-6 pull-right right-header p-0">
    <ul class="nav-menus">
        <li>
            <div class="right-header ps-0">
                <form next="nextInput" class="onSubmitNextPage input-group">
                    <div class="input-group-prepend">
                        <label role="button" for="submitNextPageInput" class="input-group-text mobile-search">
                            <i class="fa fa-search">
                            </i>
                        </label>
                    </div>
                    <input id="nextInput" list="browsers" autocomplete="off" name="keyword" class="form-control"
                        type="text" placeholder="Tìm kiếm...">
                    <input style="scale: 0; opacity: 0; width: 0; height: 0;" type="submit" id="submitNextPageInput">
                    <datalist id="browsers">
                        @foreach ($menu as $item)
                            <option val='test' value="👉 Trang: {{ $item['text'] }}">
                        @endforeach
                    </datalist>
                </form>
            </div>
        </li>
        <li class="serchinput">
            <div class="serchbox">
                <i data-feather="search">
                </i>
            </div>
            <form next="_nextInput" class="onSubmitNextPage form-group search-form">
                <input id="_nextInput" list="_browsers" autocomplete="off" name="keyword" type="text"
                    placeholder="Tìm kiếm...">

                <datalist id="_browsers">
                    @foreach ($menu as $item)
                        <option val='test' value="👉 Trang: {{ $item['text'] }}">
                    @endforeach
                </datalist>
            </form>
        </li>
        <script>
            document.querySelectorAll(".onSubmitNextPage").forEach((item) => item.addEventListener('submit', (e) => {
                e.preventDefault();
                const a = document.querySelector(`#${e.target.attributes['next'].value}`);
                const value = a.value.split("👉 Trang: ")[1];

                const arr = [];
                @foreach ($menu as $item)
                    if (value == `<?= $item['text'] ?>`) {
                        location.href = `<?= $item['link'] ?>`;
                    }
                @endforeach
            }))
        </script>
        {{-- <li>
            <div class="mode">
                <i class="fa fa-moon-o">
                </i>
            </div>
        </li> --}}
        <li class="onhover-dropdown">
            <div class="notification-box position-relative">
                <i data-feather="bell">

                </i>
                <span id="link-notification-box">
                   
                </span>
               
            </div>

            <ul id="link-notification-dropdown" class="notification-dropdown onhover-show-div">
                
               
            </ul>
        </li>
        <li class="maximize">
            <a href="#!" onclick="javascript:toggleFullScreen()">
                <i data-feather="maximize-2">
                </i>
            </a>
        </li>
        <li class="profile-nav onhover-dropdown">
            <div class="account-user">
                <i data-feather="user">
                </i>
            </div>
            <ul class="profile-dropdown onhover-show-div">
                <li>
                    <a href="{{route('user')}}">
                        <i data-feather="user">
                        </i>
                        <span>Tài khoản</span>
                    </a>
                </li>

            </ul>
        </li>
    </ul>
</div>
