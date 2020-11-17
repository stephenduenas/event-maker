
export const HelperMixin = {

    methods: {
        /**
         * Api Request
         * Note: Prefixes are their respective data types.
         * @param {string} sMethod
         * @param {object} oData
         * @param {string} sUrl
         */
        async apiRequest(sMethod = 'GET', oData = {}, sUrl = '') {
            const oRequestSettings = {
                method: sMethod,
                url: `api/${sUrl}`,
                data: oData
            };
            return axios(oRequestSettings);
        }
    }
    
}