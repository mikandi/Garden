<!DOCTYPE html>
<html>
<head>
  {asset name="Head"}
</head>
<body id="{$BodyID}" class="{$BodyClass}">
<div id="Frame">
  <div class="Top">
    <div class="Row">
      <div class="TopMenu">
          <a href="/" title="Home">Home</a>
          <a href="https://developer.mikandi.com/" title="MiKandi Developer Portal">Developer Portal</a>
          <a href="https://mikandi.com/" title="MiKandi Web Site">MiKandi Site</a>
          <a href="https://mikandi.com/mint" title="MiKandi Mint List">Mint List</a>
        <!--
        You can add more of your top-level navigation links like this:

        <a href="#">Store</a>
        <a href="#">Blog</a>
        <a href="#">Contact Us</a>
        -->
      </div>
   </div>
  </div>
  <div class="Banner">
    <div class="Row">
      <strong class="SiteTitle"><a href="{link path="/"}">{logo}</a></strong>
      <!--
      We've placed this optional advertising space below. Just comment out the line and replace "Advertising Space" with your 728x90 ad banner. 
      -->
      <!-- <div class="AdSpace">Advertising Space</div> -->
    </div>
  </div>
  <div id="Head">
    <div class="Row">
      <div class="SiteSearch">{searchbox}</div>
      <ul class="SiteMenu">
       {dashboard_link}
       {discussions_link}
       {activity_link}
       {inbox_link}
       {custom_menu}
       {profile_link}
       {signinout_link}
      </ul>
    </div>
  </div>
  <div class="BreadcrumbsWrapper">
    <div class="Row">
     {breadcrumbs}
    </div>
  </div>
  <div id="Body">
    <div class="Row">
      <div class="Column PanelColumn" id="Panel">
         {module name="MeModule"}
         {asset name="Panel"}
      </div>
      <div class="Column ContentColumn" id="Content">{asset name="Content"}</div>
    </div>
  </div>
  <div id="Foot">
    <div class="Row">
      <a href="https://mikandi.com/2257">18 U.S.C &para;2257</a>&nbsp;|&nbsp;<a href="https://mikandi.com/tos">Terms of Service</a>&nbsp;|&nbsp;<a href="https://mikandi.com/privacy">Privacy Policy</a>&nbsp;|&nbsp;<a href="https://mikandi.com/dmca">DMCA</a> 
    </div>
  </div>
</div>
{event name="AfterBody"}
</body>
</html>