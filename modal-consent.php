<?php

/**
 * Plugin Name: Modal Consent
 * Description: Adiciona um modal flutuante para notificar o uso de cookies
 * Version: 1.0.1
 * Author: Marcos Cordeiro
 * Author URI: https://github.com/marcoscti
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: marcoscti
 */

add_action('wp_footer', function () {
?>
    <div id="modal-consent">
        <div>
            <div id="icon">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30px" height="30px" viewBox="0 0 24 24" version="1.1">
                    <g id="surface1">
                        <path style=" stroke:none;fill-rule:nonzero;fill:#0094C6;fill-opacity:1;" d="M 21.597656 11.0625 C 21.355469 10.878906 21.039062 10.816406 20.742188 10.890625 C 20.5 10.960938 20.25 10.996094 20 11 C 18.347656 11 17 9.652344 16.996094 8.0625 C 17.003906 8.027344 17.011719 7.929688 17.015625 7.894531 C 17.027344 7.578125 16.890625 7.273438 16.640625 7.074219 C 16.394531 6.875 16.066406 6.804688 15.761719 6.886719 C 15.511719 6.957031 15.257812 6.996094 15 7 C 13.347656 7 12 5.652344 12 4 C 12 3.78125 12.03125 3.554688 12.097656 3.285156 C 12.175781 2.96875 12.097656 2.636719 11.886719 2.390625 C 11.671875 2.144531 11.355469 2.015625 11.03125 2.046875 C 5.898438 2.527344 1.980469 6.84375 2 12 C 2 17.515625 6.484375 22 12 22 C 17.515625 22 22 17.515625 22 12 C 22 11.949219 21.996094 11.902344 21.992188 11.839844 C 21.984375 11.535156 21.839844 11.25 21.597656 11.0625 Z M 8.5 6 C 9.328125 6 10 6.671875 10 7.5 C 10 8.328125 9.328125 9 8.5 9 C 7.671875 9 7 8.328125 7 7.5 C 7 6.671875 7.671875 6 8.5 6 Z M 6.5 14 C 5.671875 14 5 13.328125 5 12.5 C 5 11.671875 5.671875 11 6.5 11 C 7.328125 11 8 11.671875 8 12.5 C 8 13.328125 7.328125 14 6.5 14 Z M 9.5 18 C 8.671875 18 8 17.328125 8 16.5 C 8 15.671875 8.671875 15 9.5 15 C 10.328125 15 11 15.671875 11 16.5 C 11 17.328125 10.328125 18 9.5 18 Z M 12 11.5 C 12 10.671875 12.671875 10 13.5 10 C 14.328125 10 15 10.671875 15 11.5 C 15 12.328125 14.328125 13 13.5 13 C 12.671875 13 12 12.328125 12 11.5 Z M 15.5 18 C 14.671875 18 14 17.328125 14 16.5 C 14 15.671875 14.671875 15 15.5 15 C 16.328125 15 17 15.671875 17 16.5 C 17 17.328125 16.328125 18 15.5 18 Z M 15.5 18 " />
                    </g>
                </svg>
            </div>
            <p>
                Utilizamos cookies para melhorar sua experiência em nosso site e analisar nosso tráfego.
                Ao continuar, você concorda com o uso de cookies. <br>Para mais informações acesse a nossa página de <a href="https://igesdf.org.br/politica-de-privacidade/" target="blank">Política de privacidade</a>.
            <div class="inputs">
                <label><input type="checkbox" id="necessary" checked disabled> Necessários</label><br>
                <label><input type="checkbox" id="analytics" checked> Google Analytics</label>
            </div>
            <br>
            <button id="btn-accept">Aceitar</button>
            <button id="btn-decline">Recusar</button>
            </p>
        </div>
    </div>
    <style>
        #modal-consent {
            display: none;
            position: fixed;
            bottom: 10px;
            left: 10px;
            right: 0;
            background: #fff;
            padding: 20px;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.2);
            text-align: center;
            z-index: 9999;
            max-width: 400px;
            border-radius: 10px;
        }

        .inputs {
            text-align: left;
            margin: 15px 0 0;
            font-size: 14px;
        }

        #modal-consent p {
            max-width: 1280px;
            margin: 0 auto;
            font-size: 14px;
        }

        #modal-consent #btn-accept {
            background-color: #0094C6;
            border: none;
            padding: 10px 30px;
            color: #fff;
            cursor: pointer;
            border-radius: 4px;
            font-weight: 600;
            font-size: 15px;
        }

        #modal-consent #btn-accept:hover {
            background-color: #00B3C4;
        }

        #modal-consent #btn-decline {
            background-color: #adadadff;
            border: none;
            padding: 10px 30px;
            color: #fff;
            cursor: pointer;
            border-radius: 4px;
            font-weight: 600;
            font-size: 15px;
        }

        #modal-consent #btn-decline:hover {
            background-color: #ec6608;
        }
    </style>
    <script>
        class CookieConsent {
            constructor() {
                this.opened = false;
                const cookie = localStorage.getItem("cookieConsent")
                document.addEventListener("DOMContentLoaded", (event) => {
                    if (cookie && cookie == 'accepted') {
                        this.loadAnalytics()
                    }

                });
                document.addEventListener('scroll', () => {
                    if (!cookie && !this.opened) {
                        if (window.scrollY > 150) {
                            this.divStyle("block")
                            this.opened = true;
                        }
                    } else if (cookie) {
                        this.divStyle("none")
                    }
                });

            }

            loadAnalytics() {
                const ga = document.createElement("script");
                ga.src = "https://www.googletagmanager.com/gtm.js?id=GTM-PTHF3FCF";
                document.head.appendChild(ga);
            }

            saveConsent() {
                const consent = {
                    analytics: document.getElementById("analytics").checked,
                };

                this.localStorageSetData(JSON.stringify(consent))
                this.divStyle("none")
                if (consent.analytics) {
                    loadAnalytics();
                }
            }

            acceptCookies() {
                this.localStorageSetData("accepted")
                this.divStyle("none")
                this.loadAnalytics()
            }
            declineCookies() {
                this.localStorageSetData("declined")
                this.divStyle("none")
            }
            divStyle(style) {
                document.getElementById("modal-consent").style.display = style;
            }
            localStorageSetData(status) {
                localStorage.setItem("cookieConsent", status);
            }
        }
        const cookies = new CookieConsent()
        document.getElementById('btn-accept').addEventListener('click', () => {
            cookies.acceptCookies()
        })
        document.getElementById('btn-decline').addEventListener('click', () => {
            cookies.declineCookies()
        })
    </script>
<?php
});
