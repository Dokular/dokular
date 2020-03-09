<template>
<footer id="footer">
  <div class="container">
    <div class="row">
      <div class="col-6 col-md">
        <h2 class="footer-header">Legal</h2>
        <ul class="footer-links list-unstyled text-small">
          <li><a class="text-muted" href="#">Privacy</a></li>
          <li><a class="text-muted" href="#">Terms</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h2 class="footer-header">Follow us</h2>
        <ul class="footer-links list-unstyled text-small">
          <li><a class="text-muted" href="https://www.facebook.com/dokularDotCom/">Facebook</a></li>
          <li><a class="text-muted" href="#">Instagram</a></li>
          <li><a class="text-muted" href="https://twitter.com/dokularNG">Twitter</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h2 class="footer-header">Contact us</h2>
        <p class="email">
            support@dokular.com
        </p>
        <p class="whatsapp">
            <a href="https://api.whatsapp.com/send?phone=+2349067002225" target="_blank">
                <font-awesome-icon
                  :icon="['fab', 'whatsapp']"
                  size="lg"
                />
            </a>
        </p>
      </div>
      <div class="col-6 col-md">
        <h2 class="footer-header">Location</h2>
        <p class="address">
            8 Ayinde Giwa Street, Off Ogunlana Drive, Surulere, Lagos.
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-md">
          Treehill Tech Solutions
        <small class="d-block mb-3 text-muted">&copy; {{ new Date().getFullYear() }}</small>
      </div>
    </div>
  </div>
</footer>
</template>
<style lang="css" scoped>
footer#footer{
    background-color: #343a40  !important;
    color: #fff;
    padding: 15px;
}

footer#footer .footer-header{
    font-size: 13px;
    font-weight: 700;
    margin-bottom: 40px;
    text-transform: uppercase;
    margin-top: 77px;
}

footer#footer .footer-links{
    display: block;
    padding: 7px 0;
    line-height: 30px;
    cursor: pointer;
    color: #7c7c7d;
    font-weight: 500;
    display: block!important;
}

footer#footer .address{
    font-size: 14px;
    color: #aaa;
    font-weight: 500;
}
</style>
