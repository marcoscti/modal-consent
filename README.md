# Modal Cookie Consent for WordPress

!WordPress Version
!License

Um plugin leve para WordPress que adiciona um modal de consentimento de cookies para conformidade com a **LGPD** e **GDPR**.

## ✨ Recursos

- 📜 **Trigger Inteligente**: O modal aparece apenas após 150px de rolagem da página.
- 📊 **Controle de Analytics**: O usuário pode optar por ativar ou desativar o rastreamento do Google Analytics.
- 🚀 **Injeção de Script Dinâmica**: O Google Tag Manager (GTM) só é carregado se o consentimento for concedido.
- 💾 **Zero Database**: As escolhas são armazenadas localmente no navegador (`localStorage`), garantindo performance e privacidade.
- 🎨 **Minimalista**: Design limpo e moderno que não interfere na usabilidade do site.

## 🚀 Instalação

1. Baixe ou clone este repositório.
2. Coloque a pasta `modal-consent` em seu diretório `wp-content/plugins/`.
3. Ative o plugin no painel administrativo do WordPress.

## ⚙️ Funcionamento

O plugin injeta o modal diretamente no `wp_footer`. A lógica de consentimento funciona da seguinte forma:
- Se o usuário já aceitou anteriormente, os scripts de Analytics são carregados imediatamente ao carregar a página.
- Se for um novo usuário, o modal aguarda o scroll para aparecer.
- Ao clicar em "Aceitar", o estado é salvo e o GTM é inicializado.

## 🛠️ Tecnologias

- PHP (WordPress API)
- Vanilla JavaScript (Modern Class-based)
- CSS3 (Flexbox/Fixed position)

## 📄 Licença

Este projeto está licenciado sob a GPL-2.0.

---
Desenvolvido por Marcos Cordeiro