/*
 * @author  Tigren Solutions <info@tigren.com>
 * @copyright Copyright (c) 2022 Tigren Solutions <https://www.tigren.com>. All rights reserved.
 * @license  Open Software License (“OSL”) v. 3.0
 */
require(["jquery", 'mage/storage'],
    function ($, storage) {
        const urlCurrent = window.location.href;
        const keyParam = urlCurrent.substring(urlCurrent.indexOf('?key=') + 5);
        const url = window.location.origin + '/rest/V1/token';
        const urlDelete = window.location.origin + '/rest/V1/token/' + keyParam;
        if (!localStorage.getItem("access")) {
            if (!urlCurrent.includes('restrictaccess')) {
                handleAccess();
            }
        }
        /**
         * handle access role
         */
        function handleAccess() {
            return storage.get(
                url,
                false
            ).done(
                function (data) {
                    let match = false;
                    Object.keys(data).forEach(key => {
                        if(data[key].token_value ===keyParam) {
                            match = true;
                            return false;
                        }
                    });
                    if(match) {
                        deleteTokenValue(keyParam)
                    } else {
                        window.location.href = window.location.origin + '/restrictaccess';
                    }
                }
            )
        }

        /**
         * delete token in database
         */
        function deleteTokenValue(keyParam) {
            return storage.delete(
                urlDelete,
                true
            ).done(
                function (){
                    localStorage.setItem("access", "allow")
                }
            )
        }
    }
);
