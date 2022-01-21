<template>
<div class="text-center">
  <social-sharing
        url="http://localhost/cakephp/keizibann/public/users"
        title="ｔちゃねるの投稿"
        description="http://localhost/cakephp/keizibann/public/users"
        hashtags="tちゃんねる,画像掲示板"
        quote="Vue is a progressive framework for building user interfaces."
        twitter-user="test"
      >
    <div>
        <network network="email">
            <i class="fa fa-envelope"></i> Email
        </network>
        <network network="facebook">
          <i class="fa fa-facebook"></i> Facebook
        </network>
        <network network="googleplus">
          <i class="fa fa-google-plus"></i> Google +
        </network>
        <network network="line">
          <i class="fa fa-line"></i> Line
        </network>
        <network network="twitter">
          <i class="fa fa-twitter"></i> Twitter
        </network>
    </div>
  </social-sharing>
</div>
</template>


<script>
    export default {

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
