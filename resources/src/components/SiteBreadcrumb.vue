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
                        {href: this.origin + this.target.slug, name: this.target.title}
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
