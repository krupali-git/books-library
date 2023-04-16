<template>
<div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <div class="images p-3">
                            <div class="text-center p-4"><img id="main-image" :src="book.image_url" width="450" height="350" /> </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <router-link :to="{ name: 'books'}"><div class="d-flex align-items-center"><i class="fa fa-arrow-left"></i><span class="ml-1">Back</span></div></router-link>
                            </div>
                            <div class="mt-4 mb-3">
                                <h5 class="text-uppercase">{{book.title}}</h5>
                                <div class="price d-flex flex-row align-items-center"><span class="act-price">ISBN : {{book.isbn}}</span>
                                    <div class="ml-2 mx-5">Published On : <span>{{book.published_on}}</span> </div>
                                </div>
                            </div>
                            <div class="mt-4 mb-3">
                                <div class="price d-flex flex-row align-items-center"><span class="act-price">Author : {{book.author}}</span>
                                    <div class="ml-2 mx-5">Genre : <span>{{book.genre}}</span> </div>
                                </div>
                            </div>
                            <p class="about">{{book.description}}</p>
                            <div class="sizes mt-5">
                                <h6 class="text-uppercase">Published By : {{book.publisher}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
 
<script>
    export default {
        data() {
            return {
                book: {},
            }
        },
        created() {
        	this.axios
                .get(`/api/books/${this.$route.params.bookId}`)
                .then((response) => {
                    this.book = response.data;
                });
        },
        methods: {
        }
    }
</script>