<template>
    <div id="productReviewForm">
        <div class="border-top"></div>
        <div class="review-title has-text-centered">Make your review</div>
        <div class="review-form">
            <form @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
                <div class="field">
                    <label class="label">Rating</label>
                    <div class="control">
                        <star-rating v-model="form.rating" :star-size="20" active-color="#000" border-color="#000"></star-rating>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Content</label>
                    <div class="control">
                        <textarea 
                            :class="{'textarea': true, 'is-danger': form.errors.has('content')}" 
                            name="content" 
                            v-model="form.content" 
                            placeholder="Say something ...">
                        </textarea>
                        <p class="help is-danger" v-if="form.errors.has('content')">{{ form.errors.get('content') }}</p>
                    </div>
                </div>
                <div class="submit has-text-centered">
                    <button type="submit" class="button btn-black btn-medium" :disable="form.errors.any()">Submit</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: 'ProductReviewForm',
    data() {
        return {
            form: new Form({
                rating: 0,
                content: ''
            })
        }
    },
    computed: {
        form() {
            return new Form ({
                rating: 0,
            })
        }
    },
    methods: {
        onSubmit() {
            alert('oke')
            // check for login
            // submit
            // response => push to $root.reviews
        }
    }
}
</script>

<style lang="scss" scoped>
    #productReviewForm {
        .border-top {
            width: 80%;
            margin: 20px auto;
            height: 1px;
            background-color: #000;
        }
        .review-title {
            font-size: 1.25rem;
            font-family: 'aileron-black';
            margin-bottom: 1rem;
        }
        .review-form {
            label {
                font-size: 1.25rem;
                font-family: 'aileron-black';
            }
        }
    }
</style>