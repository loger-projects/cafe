<template>
    <div class="container" id="site-header-nav">
        <div class="row">
            <div class="col-auto site-logo">
                <!-- Logo -->
                <img src="/img/SiteHeaderNavLogoBlack.png" alt="No Image">
            </div>
            <div class="col navigator">
                <!-- Navigation -->
                <div class="row">
                    <div class="col">
                        <ul class="nav">
                            <li class="nav-item"><a href="#" class="na">Home</a></li>
                            <li class="nav-item"><a href="#" class="na">About Us</a></li>
                            <li class="nav-item"><a href="#" class="na">Offer</a></li>
                            <li class="nav-item"><a href="#" class="na">Menu</a></li>
                            <li class="nav-item"><a href="#" class="na">Team</a></li>
                            <li class="nav-item"><a href="#" class="na">Blog</a></li>
                            <li class="nav-item"><a href="#" class="na">Gallery</a></li>
                        </ul>
                    </div>
                    <div class="col-auto">
                        <a href="#"><i class="fas fa-search"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-auto items-box">
                <!-- cart / user -->
                <a href="#"><i class="fas fa-user"></i></a>
            </div>
        </div>
    </div>
</template>
<style lang="scss" scoped>
    div#site-header-nav {
        border: 2px solid #000;
        div.navigator {
            ul.nav {
                justify-content: end;
            }
        }
    }
    div.items-box {
        a {
            color: #000;
        }
    }
</style>

<script>
export default {
    name: 'SiteHeaderNav'
}
</script>