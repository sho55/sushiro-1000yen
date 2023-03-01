<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}"></script>
    <title>スシロー1000円ガチャ</title>
</head>
<style>
    body{
        background-image:
        repeating-linear-gradient(
        45deg,
        #A70F16 ,
        #A70F16 2px,
        transparent 1px,
        transparent 32px
        ),
        repeating-linear-gradient(
        135deg,
        #A70F16 ,
        #A70F16 2px,
        #fff 1px,
        #fff 32px
        );
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
                    <h1 style="font-weight: bold;">スシロー1000円ガチャ</h1>
                </div>
                <div class="mx-3 my-2">
                   <div class="text-center">{!! nl2br(e("こちらはスシロー非公式の1000円ガチャになります。\n 対象はフードメニュー(にぎり、軍艦・巻物、サイドメニュー、デザート)のみです。\n 値段の都合上、合計1000円に満たない場合もございます。",false)) !!}</div>
                </div>
                <div class="mx-auto">
                    <div class="bg-opacity-10 bg-secondary border border-dark mt-3 py-1 rounded-1">
                        <div class="fw-bold text-center">店舗のタイプ</div>
                        <form action="/result" method="get">
                            <div class="d-flex justify-content-center my-2">
                                <div class="form-check mx-1">
                                    <input class="form-check-input" type="radio" name="store_type" id="store_type_1" value="city_price" required>
                                    <label class="form-check-label align-middle" for="store_type_1">
                                        都市型(1皿150円~)
                                    </label>
                                </div>
                                <div class="form-check mx-1">
                                    <input class="form-check-input" type="radio" name="store_type" id="store_type_2"
                                        value="semi_city_price" required>
                                    <label class="form-check-label align-middle" for="store_type_2">
                                        準都市型(1皿130円~)
                                    </label>
                                </div>
                                <div class="form-check mx-1">
                                    <input class="form-check-input" type="radio" name="store_type" id="store_type_3"
                                        value="suburb_price" required>
                                    <label class="form-check-label align-middle" for="store_type_3">
                                        郊外型(1皿120円~)
                                    </label>
                                </div>
                            </div>
                            <div class="text-center bg-warning p-1">値段に関して店舗ごとに異なることがございます。<div class="d-block d-md-none"></div>
                                <a href='https://www.akindo-sushiro.co.jp/shop/'
                                    target='_blank'>こちら</a>からご参考ください。</div>
                            <div class="d-flex justify-content-center mt-3">
                                <button type="submit" class="btn btn-outline-primary text-center">
                                    回す
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="my-3">
                    <h2 class="h3 fw-bold">注意事項・免責</h2>
                    <ul>
                        <li>本サイトは食事を楽しむための一つの選択肢としてお使いください。</li>
                        <li>本サイトでの結果によって起きた出来事については一切の責任を問いません。</li>
                        <li>メニューの変更、価格の変更が起きる場合がございます。あらかじめご了承ください。</li>
                        <li>本サイトは<a href="https://www.akindo-sushiro.co.jp/" target="_blank" rel="noopener noreferrer" class="text-dark">株式会社あきんどスシロー</a>様とは関係がございません。</li>
                        <li>不具合、リクエストは<a href="https://docs.google.com/forms/d/e/1FAIpQLSfFMftiMibcqzxwIZHXxVNw9mlI0PvzpyDQ1CwdHSEx5WzQbA/viewform?usp=sf_link" target="_blank" rel="noopener noreferrer"
                            class="text-dark">お問合せ</a>よりご連絡お願いいたします。</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-white p-4 mt-2 fixed-bottom">
        <div class="d-flex justify-content-center">
            <a href="https://docs.google.com/forms/d/e/1FAIpQLSfFMftiMibcqzxwIZHXxVNw9mlI0PvzpyDQ1CwdHSEx5WzQbA/viewform?usp=sf_link" target="_blank" rel="noopener noreferrer" class="fw-bold mx-2 text-dark text-decoration-none">お問合せ</a>
            <a href="https://twitter.com/sima199407" target="_blank" rel="noopener noreferrer"
                            class="fw-bold mx-2 text-dark text-decoration-none">開発者<span style="color:#1DA1F2;">Twitter</span></a>
                        <a href="https://www.youtube.com/@Monsho_" target="_blank" rel="noopener noreferrer"
                            class="fw-bold mx-2 text-dark text-decoration-none">開発者<span class="text-danger">YouTube</span></a>
        </div>
    </footer>
</body>

</html>