
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
        },
        
        getStringMonth(oDate) {
            const LOCALE = 'default';
            const OPTIONS = {
                month: 'long'
            };
            return oDate.toLocaleString(LOCALE, OPTIONS);
        },
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
