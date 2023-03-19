<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="keywords" content="スシロー,スシロー1000円ガチャ,1000円ガチャ,遊び,ランダム,メニュー">
    <meta name="description" content="スシローのメニューをランダムで1000円以内で選びます。スシロー非公式アプリ。">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
    <title>結果ページ</title>
</head>

<style>
    body {
        background-image:
            repeating-linear-gradient(45deg,
                #A70F16,
                #A70F16 2px,
                transparent 1px,
                transparent 32px),
            repeating-linear-gradient(135deg,
                #A70F16,
                #A70F16 2px,
                #fff 1px,
                #fff 32px);

    }

    @media screen and (max-width: 768px) {

        td.label-col {
            font-size: 70%;
            width: 30%;
            vertical-align: middle;
        }
    }
</style>


<body>
    <header class="bg-white p-3 mb-2">
        <a href="/" class="fw-bold h3 text-dark text-decoration-none">スシロー1000円ガチャ</a>
    </header>
    <div class="containar">
        <div class="gx-0 row justify-content-center">
            <div class="col-12 col-sm-8 col-md-6 bg-white mt-3 px-1 py-3" style="margin: 0 0 120px;">
                <div class="mt-3 text-center">
                    <h1 style="font-weight: bold;">スシロー1000円ガチャ<div>結果</div>
                    </h1>
                    <p>店舗形態 : <span class="font-weight-bold">{{config('global.store_type.'.$store_type)}}</span>型</p>
                </div>
                <table class="table result-table">
                    <tr>
                        <th class="w-auto">カテゴリー</th>
                        <th class="w-md-50">名前</th>
                        <th class="">値段</th>
                        <th class="">カロリー</th>
                    </tr>
                    @foreach ($arr_items as $item)
                    <tr>
                        <td class="label-col">
                            <span class="mx-1">
                                @if ($item['category_id'] == 1)
                                <span class="bg-danger px-1 px-md-3 py-1 py-md-1 rounded-3 text-white">握り</span>
                                @elseif($item['category_id'] == 2)
                                <span class="bg-primary px-1 px-md-3 py-1 py-md-1 rounded-3 text-white">軍艦・巻物</span>
                                @elseif($item['category_id'] == 3)
                                <span class="bg-success px-1 px-md-3 py-1 py-md-1 rounded-3 text-white">サイドメニュー</span>
                                @elseif($item['category_id'] == 4)
                                <span class="bg-warning px-1 px-md-3 py-1 py-md-1 rounded-3 text-white">デザート</span>
                                @else
                                <span class="bg-secondary px-1 px-md-3 py-1 py-md-1 rounded-3 rounded-3">その他</span>
                                @endif
                            </span>
                        </td>
                        <td>
                            {{ $item['name'] }}
                        </td>
                        <td>
                            @if ($store_type == 'city_price')
                            {{ $item['city_price'] }}
                            @elseif($store_type == 'semi_city_price')
                            {{ $item['semi_city_price'] }}
                            @else
                            {{ $item['suburb_price'] }}
                            @endif
                        </td>
                        <td>{{ $item['kcal'] }}</td>
                    </tr>
                    @endforeach
                </table>
                <div class="col-12 text-center">
                    <h3 class="p-1 text-bg-danger">合計</h3>
                    <div class="font-weight-bold text-danger mt-2">
                        <span></span><span class="mx-md-1" style="font-size:20px;">{{ $total_price }}</span>円
                    </div>
                    <div class="font-weight-bold text-danger">
                        <span></span><span class="mx-md-1" style="font-size:20px;">{{ $total_kcal }}</span>kcal
                    </div>
                </div>
                <?php
                $txt = '🍣スシロー1000円ガチャを回したよ！'. '%0A';
                $txt .= '【'.config('global.store_type.'.$store_type).'型】'. '%0A';
                foreach($arr_items as $item){
                    $txt .= '・'.$item['name']. '%0A';
                }
                $txt .= '合計:'.  $total_price.'円';
                $encode_txt =  base64_encode($txt);
                ?>

                <div class="col-12 text-center">
                    <a href="https://twitter.com/share?url=&amp;text={{$txt}}&amp;hashtags=スシロー1000円ガチャ%0Ahttps://sushiro-1000yen.shoheimomma.com/"
                        target="_blank" rel="noopener noreferrer"><img class="tweet-button" width="48" height="48"
                            src="data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJMYXllcl8yIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCINCgkgdmlld0JveD0iMCAwIDQwMCA0MDAiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDQwMCA0MDA7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+DQoJLnN0MHtmaWxsOiMxQjlERjA7fQ0KCS5zdDF7ZmlsbDojRkZGRkZGO30NCjwvc3R5bGU+DQo8ZyBpZD0iRGFya19CbHVlIj4NCgk8Y2lyY2xlIGNsYXNzPSJzdDAiIGN4PSIyMDAiIGN5PSIyMDAiIHI9IjIwMCIvPg0KPC9nPg0KPGcgaWQ9IkxvZ29fX3gyMDE0X19GSVhFRCI+DQoJPHBhdGggY2xhc3M9InN0MSIgZD0iTTE2My40LDMwNS41Yzg4LjcsMCwxMzcuMi03My41LDEzNy4yLTEzNy4yYzAtMi4xLDAtNC4yLTAuMS02LjJjOS40LTYuOCwxNy42LTE1LjMsMjQuMS0yNQ0KCQljLTguNiwzLjgtMTcuOSw2LjQtMjcuNyw3LjZjMTAtNiwxNy42LTE1LjQsMjEuMi0yNi43Yy05LjMsNS41LTE5LjYsOS41LTMwLjYsMTEuN2MtOC44LTkuNC0yMS4zLTE1LjItMzUuMi0xNS4yDQoJCWMtMjYuNiwwLTQ4LjIsMjEuNi00OC4yLDQ4LjJjMCwzLjgsMC40LDcuNSwxLjMsMTFjLTQwLjEtMi03NS42LTIxLjItOTkuNC01MC40Yy00LjEsNy4xLTYuNSwxNS40LTYuNSwyNC4yDQoJCWMwLDE2LjcsOC41LDMxLjUsMjEuNSw0MC4xYy03LjktMC4yLTE1LjMtMi40LTIxLjgtNmMwLDAuMiwwLDAuNCwwLDAuNmMwLDIzLjQsMTYuNiw0Mi44LDM4LjcsNDcuM2MtNCwxLjEtOC4zLDEuNy0xMi43LDEuNw0KCQljLTMuMSwwLTYuMS0wLjMtOS4xLTAuOWM2LjEsMTkuMiwyMy45LDMzLjEsNDUsMzMuNWMtMTYuNSwxMi45LTM3LjMsMjAuNi01OS45LDIwLjZjLTMuOSwwLTcuNy0wLjItMTEuNS0wLjcNCgkJQzExMC44LDI5Ny41LDEzNi4yLDMwNS41LDE2My40LDMwNS41Ii8+DQo8L2c+DQo8L3N2Zz4NCg0K"></a>
                </div>
                <div class="mx-auto">
                    <div class="bg-opacity-10 bg-secondary border border-dark mt-5 py-3 rounded-1">
                        <div class="fw-bold text-center">店舗のタイプ</div>
                        <form action="/result" method="get">
                            <div class="d-flex justify-content-center my-2">
                                <div class="form-check mx-1">
                                    <input class="form-check-input" type="radio" name="store_type" id="store_type_1"
                                        value="city_price" {{ $store_type=="city_price" ? 'checked' : '' }} required>
                                    <label class="form-check-label align-middle" for="store_type_1">
                                        都市型(1皿150円~)
                                    </label>
                                </div>
                                <div class="form-check mx-1">
                                    <input class="form-check-input" type="radio" name="store_type" id="store_type_2"
                                        value="semi_city_price" {{ $store_type=="semi_city_price" ? 'checked' : '' }}
                                        required>
                                    <label class="form-check-label align-middle" for="store_type_2">
                                        準都市型(1皿130円~)
                                    </label>
                                </div>
                                <div class="form-check mx-1">
                                    <input class="form-check-input" type="radio" name="store_type" id="store_type_3"
                                        value="suburb_price" {{ $store_type=="suburb_price" ? 'checked' : '' }}
                                        required>
                                    <label class="form-check-label align-middle" for="store_type_3">
                                        郊外型(1皿120円~)
                                    </label>
                                </div>
                            </div>
                            <div class="text-center bg-warning p-1">値段に関して店舗ごとに異なることがございます。<div
                                    class="d-block d-md-none"></div>
                                <a href='https://www.akindo-sushiro.co.jp/shop/' target='_blank'>こちら</a>からご参考ください。
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                <button type="submit" class="btn btn-outline-primary text-center">
                                    もう一度引く
                                </button>
                            </div>
                        </form>
                    </div>



                    <div class="mt-4 d-flex justify-content-center">
                        <a href="/" class="text-dark text-decoration-none">戻る</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-white p-4 mt-2 fixed-bottom" style="margin: 120px 0 0;">
        <div class="d-flex justify-content-center">
            <a href="https://docs.google.com/forms/d/e/1FAIpQLSfFMftiMibcqzxwIZHXxVNw9mlI0PvzpyDQ1CwdHSEx5WzQbA/viewform?usp=sf_link"
                target="_blank" rel="noopener noreferrer" class="fw-bold mx-2 text-dark text-decoration-none">お問合せ</a>
            <a href="https://twitter.com/sima199407" target="_blank" rel="noopener noreferrer"
                class="fw-bold mx-2 text-dark text-decoration-none">開発者<span style="color:#1DA1F2;">Twitter</span></a>
            <a href="https://www.youtube.com/@Monsho_" target="_blank" rel="noopener noreferrer"
                class="fw-bold mx-2 text-dark text-decoration-none">開発者<span class="text-danger">YouTube</span></a>
        </div>
    </footer>
</body>


</html>