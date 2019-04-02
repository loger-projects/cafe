const mix = require('laravel-mix');

// mix.js('resources/src/views/SitePageHome.js', 'public/js')
//    .js('resources/src/views/PostShow.js', 'public/js')
//    .sass('resources/src/scss/master.scss', 'public/css');

mix.js('resources/src/views/UserLogin.js', 'public/js')
   .js('resources/src/views/UserVerify.js', 'public/js')
   .js('resources/src/views/UserRegister.js', 'public/js')
   .js('resources/src/views/UserPasswordEmail.js', 'public/js')
   .js('resources/src/views/UserPasswordReset.js', 'public/js')
   .js('resources/src/views/UserHome.js', 'public/js');
