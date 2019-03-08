<template>
    <div class="title-wrap">
        <slot name="header"></slot>
        <div class="title is-pacifico text-yellow first-title"><slot name="firstTitle"></slot></div>
        <div :class="{'title is-1 is-aileron-black second-title': true, 'has-text-black-ter': !isTextWhite, 'has-text-white': isTextWhite}"><slot name="secondTitle"></slot></div>
        <slot name="footer"></slot>
    </div>
</template>

<style lang="scss" scoped>
    div.title-wrap {
        text-align: center;
        div.first-title {
            margin-bottom: 10px !important;
        }
        div.second-title {
            font-size: 54px;
        }
    }
</style>

<script>
export default {
    name: 'SitePageHomeTitle',
    props: ['isTextWhite', 'firstTitle', 'secondTitle']
}
</script>
