<template>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <Products />
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>
import Products from './Products'
export default {
 data() {
     return {
     }
 },
 components: {
    Products
 }
}
</script>
