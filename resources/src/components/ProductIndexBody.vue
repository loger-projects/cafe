<template>
    <div id="productIndexBody">
        <div class="container">
            <div class="columns" id="content-wrapper">
                <div id="content" class="comlumn is-9">
                    <div class="columns filter-box">
                        <div class="select">
                            <select @change="onSelect" v-model="filter">
                                <option value="default">Default Sorting</option>
                                <option value="popularity">Sort by popularity</option>
                                <option value="rating">Sort by average rating</option>
                                <option value="latest">Sort by latest</option>
                                <option value="price-low-to-high">Sort by price: low to high</option>
                                <option value="price-hight-to-low">Sort by price: high to low</option>
                            </select>
                        </div>
                    </div>
                    <div class="columns is-multiline">
                        <product-item v-for="product in products" :key="product.id" :product="product"></product-item>
                    </div>
                    <div class="pagination-wrap">
                        <b-pagination
                            :total="pagination.total"
                            :current.sync="pagination.current_page"
                            order="is-centered"
                            :rounded="true"
                            :per-page="9"
                            icon-pack="fas"
                            @change="pageChange"
                        ></b-pagination>
                    </div>
                </div>
                <div id="sidebar" class="column is-3">
                    <product-sidebar></product-sidebar>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ProductSidebar from './ProductSidebar.vue'
import productItem from './ProductItem.vue'

export default {
    name: 'ProductIndexBody',
    components: {
        ProductSidebar,
        productItem
    },
    data() {
        return {
            filter: 'default'
        }
    },
    computed: {
        products() { return this.$root.products },
        pagination() { return this.$root.pagination }
    },
    methods: {
        onSelect() {
            axios.get('/api/products/filter/'+this.filter)
                .then(response => {
                    this.$root.products = response.data.data
                    delete response.data.data
                    this.$root.pagination = response.data
                })
        },
        pageChange(page) {
            axios.get('/api/products/filter/'+this.filter+'?page='+page)
                .then(response => {
                    this.$root.products = response.data.data
                    delete response.data.data
                    this.$root.pagination = response.data
                })
                .catch(error => {
                    console.log(error.response.data.message)
                })
        }
    }
}
</script>

<style lang="scss">
    #productIndexBody {
        padding: 50px 0;
        #content-wrapper {
            flex-direction: row-reverse;
        }
        #content {
            .filter-box {
                padding: 20px 0 !important;
                div.select {
                    margin-left: auto;
                }
            }
            .pagination-wrap {
                margin-top: 20px;
            }
        }
    }
    .product-item.article {
        padding: 0 30px 20px 30px!important;
        transition: 300ms;
        &:hover {
            box-shadow: 0px 0px 4px #795f4b
        }
        .article-head {
            padding: 20px;
            img {
                width: 100%;
            }
        }
        .article-body {
            .entry-head {
                text-align: center;
                margin-bottom: 20px;
                h2 {
                    a {
                        color: #000;
                        &:hover {
                            color: #795f4b;
                        }
                    }
                }
            }
            .entry-body {
                text-align: center;
            }
            .entry-foot {
                text-align: center;
                .price {
                    color: #000;
                    font-size: 30px;
                    font-weight: bold;
                    margin-top: 20px;
                }
                .button.add-to-cart-button {
                    width: 180px;
                    height: 45px;
                    background-color: #795f4b;
                    color: #fff;
                    font-weight: bold;
                    margin-top: 20px;
                    &:hover {
                        background-color: #000;
                    }
                    span {
                        margin-right: 15px;
                    }
                }
            }
        }
    }
</style>