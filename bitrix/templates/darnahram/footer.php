<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
    die();
?>
</div>
</div>
<div class="hFooter visible-xs visible-sm"></div>
</div>
<footer class="visible-xs visible-sm">
    <div class="footer container">
        <div class="row">
            <div class="col-xs-12 col-sm-4 text-center">
                <ul class="list-inline social">
                    <li><a href="<?=$facebook?>" target="_blank"><i class="fa fa-facebook fa-lg"></i></a></li>
                    <li><a href="<?=$twitter?>"><i class="fa fa-twitter fa-lg"></i></a></li>
                    <li><a href="<?=$youtube?>" target="_blank"><i class="fa fa-youtube fa-lg"></i></a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-4 text-center">
                <div class="phone-mail">
                    <a href="tel:+<?= preg_replace("#[^\d]#", "", $phone) ?>"><?= $phone ?></a><br>
                    <a href="mailto:<?=$email?>"><?=$email?></a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 text-center">
                <div class="baza23">
                   <a href='tel:+74951502201' target='_blank'><?=GetMessage("FOOTER_CREATOR_TEXT")?>&nbsp;<?=GetMessage("FOOTER_CREATOR_HREF")?></a>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter36274005 = new Ya.Metrika({
                    id:36274005,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/36274005" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>
</html>