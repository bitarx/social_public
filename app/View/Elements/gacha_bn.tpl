<script type="text/javascript" src="<{$smarty.const.BASE_URL}>js/jquery.bxslider.min.js"></script>
<link rel="stylesheet" href="<{$smarty.const.BASE_URL}>css/jquery.bxslider.css.php" />
<script type="text/javascript">
        $(document).ready(function(){
            $('.bxslider').bxSlider({
                auto: true,
                mode: 'fade',
            });
        });
</script>
<div class="bx-wrapper">
    <{if $ctl != 'Gachas'}>
        <a href="<{$linkGacha}>">
    <{/if}>
    <ul class="bxslider">
      <li><img src="<{$smarty.const.IMG_URL}>banner/gacha_bn1.png" title="ad1" /></li>
      <li><img src="<{$smarty.const.IMG_URL}>banner/gacha_bn2.png" title="ad2" /></li>
      <li><img src="<{$smarty.const.IMG_URL}>banner/gacha_bn3.png" title="ad3" /></li>
    </ul>
    <{if $ctl != 'Gachas'}>
        </a>
    <{/if}>
</div>
