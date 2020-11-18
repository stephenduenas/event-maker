
export const HelperMixin = {

    methods: {

        /**
         * Api Request
         * Note: Prefixes are their respective data types.
         * @param {string} sMethod
         * @param {object} oData
         * @param {string} sUrl
         */
        async apiRequest(sMethod = 'GET', sUrl = '', oData = {}) {
            const oHeaders = {
                'Accept': 'application/json',
            };
            const oRequestSettings = {
                method: sMethod,
                url: `api/${sUrl}`,
                data: oData,
                headers: oHeaders
            };
            try {
                return await axios(oRequestSettings);
            } catch(error) {
                return error.response;
            }
        }
    }
    
}
