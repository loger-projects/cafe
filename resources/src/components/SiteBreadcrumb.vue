<template>
    <div id="siteBreadcrumb">
        <nav class="breadcrumb" arial-label="breadcrumbs">
            <ul>
                <li v-for="item in breadcrumbs" :key="item.id"><a :href="item.href">{{ item.name }}</a></li>
            </ul>
        </nav>
    </div>
</template>

<script>
export default {
    name: 'SiteBreadcrumb',
    props: ['type', 'target'],
    computed: {
        origin() {
            return location.origin;
        },
        breadcrumbs() {
            switch(this.type) {
                case 'post': 
                    return [
                        {href: this.origin, name: 'Home'},
                        {href: this.origin + '/posts', name: 'Posts' },
                        {href: '', name: this.target.title}
                    ]
                break;
                case 'ProductIndex': 
                    return [
                        {href: this.origin, name: 'Home'},
                        {href: this.origin + '/products', name: 'Products'}
                    ]
                break;
                case 'ProductShow':
                    return [
                        {href: this.origin, name: 'Home'},
                        {href: this.origin + '/products', name: 'Products'},
                        {href: '', name: this.target.name}
                    ]
                break;
                case 'ProductCateShow':
                    return [
                        {href: this.origin, name: 'Home'},
                        {href: this.origin + '/products', name: 'Products'},
                        {href: '#', name: 'Category'},
                        {href: '', name: this.target.name}
                    ]
                break;
                default:
                    return;
                break;
            }
        }
    }
}
</script>

<style lang="scss" scoped>
    nav.breadcrumb {
        ul {
            li {
                a {
                    color: #795f4b;
                    &:hover {
                        color: #fff;
                    }
                }
                &:last-child {
                    a {
                        color: #fff;
                    }
                }
            }
        }
    }
</style>