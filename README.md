On the mobile app, when the customer clicks the link (or button), send an API to the Magento website (REST API).

On Magento API, verify the app token and generate a link. This link includes the Website URL + access_token.

access_token = app_token + timestamp → encode base64.

Save access_token to verify

Return the link to the mobile app

Mobile app receives the link and opens the website.

Customer uses the link to access website → verify the access_token and remove from Magento. Then the customer cannot use the link on other browsers.

Set LocalStorage on browser of customer, customer can use this browser to access the website without access_token verify.
