
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
            const APPLICATION_JSON = 'application/json'
            const oHeaders = {
                'Accept': APPLICATION_JSON,
                'Content-Type': APPLICATION_JSON
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
        },

        /**
         * Get String Month
         * @param {object} oDate 
         */
        getStringMonth(oDate) {
            const LOCALE = 'default';
            const OPTIONS = {
                month: 'long'
            };
            return oDate.toLocaleString(LOCALE, OPTIONS);
        },

        /**
         * Get String Day
         * @param {int} iDay 
         */
        getStringDay(iDay) {
            const oDays = {
                0: 'Sun',
                1: 'Mon',
                2: 'Tue',
                3: 'Wed',
                4: 'Thu',
                5: 'Fri',
                6: 'Sat',
            };
            return oDays[iDay];
        }
    }
    
}
