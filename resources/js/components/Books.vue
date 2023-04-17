<template>
<div>
    <nav class="navbar navbar-expand-lg sticky-top navbar-light bg-info" >
        <div class="float-start mx-2">
            <a class="navbar-brand text-white" href="#">
              Books Library
            </a>
        </div>
        <div class="container-fluid">
            <input class="form-control me-2" type="search" placeholder="Search by title ,author ,published date ,isbn ,genre... "  aria-label="Search" @keyup="searchBooksData($event.target.value)">
        </div>
        <div class="float-end">
            <a class="navbar-brand text-white" href="/admin/books">Admin Panel</a>
        </div>
    </nav>
    <div class="container my-5"> 
        <div class="container-fluid bg-trasparent my-4 p-3" style="position: relative">
            <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3" v-if="books && books.data.length > 0">
                <div class="col hp" v-for="book in books.data">
                  <div class="card h-100 shadow-sm">
                    <router-link :to="{ name: 'book', params: { 'bookId': book.id }}"><img :src="book.image_url" class="card-img-top" alt="Boook" /></router-link>
                    <div class="label-top float-start bg-info">
                        <span class="large text-white text-uppercase">ISBN:{{ book.isbn }}</span>
                    </div>
                    <div class="card-body">
                        <div class="clearfix mb-3">
                        <span class="float-start badge rounded-pill bg-warning">{{ book.published_on }}</span>
                            <span class="float-end small text-muted text-uppercase">{{ book.author }}</span>
                        </div>
                        <h5 class="text-center card-title">
                            <a target="_blank" href="#">{{ book.title }}</a>
                        </h5>
                    </div>
                  </div>
                </div>
            </div>
            <div v-else>
                <h1>No matching books data Found!</h1>
            </div>
            <Bootstrap5Pagination :data="books" @pagination-change-page="getResults" align="right" :class="my-10"></Bootstrap5Pagination>
        </div>
    </div>
</div>
</template>
<script setup>
import { ref } from 'vue';
import { Bootstrap5Pagination } from 'laravel-vue-pagination';

const books = ref({});
let search = '';

const getResults = async (page = 1) => {
    let url= `/api/books?page=${page}`;
    if(search != ''){
        url=url+`&search=${search}`;
    }
    const response = await fetch(url);
    books.value = await response.json();
}
getResults();
function searchBooksData(val) {
  search = val;
  getResults();
}
</script>
