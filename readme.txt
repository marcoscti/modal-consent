=== Modal Consent ===
Contributors: marcoscti
Tags: LGPD, cookies, consent, privacy, gdpr
Requires at least: 5.0
Tested up to: 6.7
Requires PHP: 7.4
Stable tag: 1.0.2
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

== Description ==

O **Modal Consent** é um plugin leve e eficiente para WordPress que ajuda seu site a cumprir as regulamentações de privacidade (LGPD/GDPR). Ele exibe um modal flutuante que solicita o consentimento do usuário para o uso de cookies.

O modal é ativado automaticamente após o usuário rolar a página por mais de 150px, garantindo que a notificação não interrompa a experiência inicial, mas permaneça visível para conformidade.

= Principais Recursos =
* **Genciamento de Cookies:** Opções para cookies necessários (obrigatórios) e Google Analytics.
* **Ativação por Scroll:** O modal aparece após 150px de rolagem.
* **Integração GTM:** Carrega automaticamente o script do Google Tag Manager apenas após o aceite.
* **Persistência:** Utiliza `localStorage` para lembrar a decisão do usuário sem sobrecarregar o banco de dados.
* **Design Responsivo:** Modal flutuante discreto e adaptado para dispositivos móveis.

== Installation ==

1. Envie a pasta `modal-consent` para o diretório `/wp-content/plugins/`.
2. Ative o plugin através do menu 'Plugins' no WordPress.
3. O modal começará a aparecer automaticamente no frontend do site.

== Frequently Asked Questions ==

= Onde os dados de consentimento são salvos? =
As preferências são salvas no navegador do usuário usando `localStorage`, sob a chave `cookieConsent`.

= Como posso alterar o ID do Google Tag Manager? =
Atualmente, o ID está configurado diretamente no código do plugin (`GTM-PTHF3FCF`). 

= O modal bloqueia o site? =
Não, o modal é flutuante e permite que o usuário continue navegando, embora o aviso permaneça visível até uma ação ser tomada.

== Changelog ==

= 1.0.2 =
* Implementação da classe CookieConsent para melhor organização do JavaScript.
* Adição de suporte a categorias de cookies (Necessários e Analytics).
* Melhoria na lógica de exibição baseada em scroll.

= 1.0.1 =
* Pequenos ajustes de CSS e layout.

= 1.0.0 =
* Lançamento inicial.