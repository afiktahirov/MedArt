<!DOCTYPE html>
<html lang="en">

<head>
    <title>Medart Hospital</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css"
        href="{{asset("css/font-awesome.min.css")}}">

    <link rel="stylesheet" href="{{asset("css/style.css")}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset("css/swiper.min.css")}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="{{asset("js/custom.js")}}"></script>
    <script nonce="fb0ed9ab-d1f9-478a-90de-8195d8019a96">
        (function(w, d) {
            ! function(bt, bu, bv, bw) {
                bt[bv] = bt[bv] || {};
                bt[bv].executed = [];
                bt.zaraz = {
                    deferred: [],
                    listeners: []
                };
                bt.zaraz.q = [];
                bt.zaraz._f = function(bx) {
                    return function() {
                        var by = Array.prototype.slice.call(arguments);
                        bt.zaraz.q.push({
                            m: bx,
                            a: by
                        })
                    }
                };
                for (const bz of ["track", "set", "debug"]) bt.zaraz[bz] = bt.zaraz._f(bz);
                bt.zaraz.init = () => {
                    var bA = bu.getElementsByTagName(bw)[0],
                        bB = bu.createElement(bw),
                        bC = bu.getElementsByTagName("title")[0];
                    bC && (bt[bv].t = bu.getElementsByTagName("title")[0].text);
                    bt[bv].x = Math.random();
                    bt[bv].w = bt.screen.width;
                    bt[bv].h = bt.screen.height;
                    bt[bv].j = bt.innerHeight;
                    bt[bv].e = bt.innerWidth;
                    bt[bv].l = bt.location.href;
                    bt[bv].r = bu.referrer;
                    bt[bv].k = bt.screen.colorDepth;
                    bt[bv].n = bu.characterSet;
                    bt[bv].o = (new Date).getTimezoneOffset();
                    if (bt.dataLayer)
                        for (const bG of Object.entries(Object.entries(dataLayer).reduce(((bH, bI) => ({
                                ...bH[1],
                                ...bI[1]
                            })), {}))) zaraz.set(bG[0], bG[1], {
                            scope: "page"
                        });
                    bt[bv].q = [];
                    for (; bt.zaraz.q.length;) {
                        const bJ = bt.zaraz.q.shift();
                        bt[bv].q.push(bJ)
                    }
                    bB.defer = !0;
                    for (const bK of [localStorage, sessionStorage]) Object.keys(bK || {}).filter((bM => bM
                        .startsWith("_zaraz_"))).forEach((bL => {
                        try {
                            bt[bv]["z_" + bL.slice(7)] = JSON.parse(bK.getItem(bL))
                        } catch {
                            bt[bv]["z_" + bL.slice(7)] = bK.getItem(bL)
                        }
                    }));
                    bB.referrerPolicy = "origin";
                    bB.src = "public/js/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(bt[bv])));
                    bA.parentNode.insertBefore(bB, bA)
                };
                ["complete", "interactive"].includes(bu.readyState) ? zaraz.init() : bt.addEventListener(
                    "DOMContentLoaded", zaraz.init)
            }(w, d, "zarazData", "script");
        })(window, document);
    </script>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script> --}}
</head>

<body class="
@if (empty(request()->segment(2)))
home-pages
@else
single-page
@endif ">
@include("layouts.partials.header")


@yield("content")


@include("layouts.partials.subscribe-banner")
@include("layouts.partials.footer")

<script data-cfasync="false" src="{{asset("js/email-decode.min.js")}}"></script>
<script type='text/javascript' src='{{asset("js/jquery.js")}}'></script>
<script type='text/javascript' src='{{asset("js/jquery.collapsible.min.js")}}'></script>
<script type='text/javascript' src='{{asset("js/swiper.min.js")}}'></script>
<script type='text/javascript' src='{{asset("js/jquery.countdown.min.js")}}'></script>
<script type='text/javascript' src='{{asset("js/circle-progress.min.js")}}'></script>
<script type='text/javascript' src='{{asset("js/jquery.countTo.min.js")}}'></script>
<script type='text/javascript' src='{{asset("js/jquery.barfiller.js")}}'></script>
<script type='text/javascript' src='{{asset("js/custom.js")}}'></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script> --}}
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v8b253dfea2ab4077af8c6f58422dfbfd1689876627854"
    integrity="sha512-bjgnUKX4azu3dLTVtie9u6TKqgx29RBwfj3QXYt5EKfWM/9hPSAI/4qcV5NACjwAo8UtTeWefx6Zq5PHcMm7Tg=="
    data-cf-beacon='{"rayId":"7ef11a9f4c499243","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2023.7.0","si":100}'
    crossorigin="anonymous"></script>
</body>

</html>
