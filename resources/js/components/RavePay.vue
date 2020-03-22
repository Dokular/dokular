<template>
    <button
      variant="primary"
      class="btn btn-primary btn-lg btn-block"
      @click="payWithRave"
      :disabled="payable"
    >
        <slot>Make Payment</slot>
    </button>
</template>
<script>
import { mapGetters, mapMutations } from "vuex";
export default {
    props: {
        isProduction: {
            type: Boolean,
            required: false,
            default: false //set to true if you are going live
        },
        amount: {
            type: Number,
            required: true
        },
        raveKey: {
            type: String,
            required: true
        },
        onClose: {
            type: Function,
            required: true,
            default: () => {}
        },
        onPayment: {
            type: Function,
            required: true,
            default: () => {}
        },
        currency: {
            type: String,
            default: "NGN"
        },
        country: {
            type: String,
            default: "NG"
        },
        customTitle: {
            type: String,
            default: "Dokular"
        },
        customLogo: {
            type: String,
            default: "https://res.cloudinary.com/rapulu/image/upload/v1584503176/dokularfavicon.png"
        },
        paymentOptions: {
            type: String,
            default: "card"
        }
    },
    created() {
        const script = document.createElement("script");
        script.src = !this.isProduction
            ? "https://ravesandboxapi.flutterwave.com/flwv3-pug/getpaidx/api/flwpbf-inline.js"
            : "https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js";
        document.getElementsByTagName("head")[0].appendChild(script);
    },
    computed: {
        ...mapGetters(["payable", "email"]),
        reference() {
            let text = "";
            let possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

            for (let i = 0; i < 10; i++)
                text += possible.charAt(
                    Math.floor(Math.random() * possible.length)
                );

            this.PAYSTACK_REFERENCE(text);

            return text;
        }
    },
    methods: {
        ...mapMutations(['PAYSTACK_REFERENCE']),

        payWithRave() {
           var x = getpaidSetup({
                customer_email: this.email,
                amount: this.amount,
                txref: this.reference,
                PBFPubKey: this.raveKey,
                onclose: () => this.onClose(),
                callback: (response) => {
                        var txref = response.data.tx.txRef; // collect txRef returned and pass to a server page to complete status check.
                        const resdata = response.data.data.responsecode;
                        if (resdata == "00" || resdata == "0") {
                            console.log("This is the response returned after a charge", response);
                            // redirect to a success page
                            x.close();
                            this.onPayment(txref);
                        } else {
                            console.log("error response block",response)
                            // redirect to a failure page.
                        }
                    },
                currency: this.currency,
                country: this.country,
                custom_title: this.customTitle,
                custom_logo: this.customLogo,
                payment_options: "card"
            });
        }
    }
};
</script>
