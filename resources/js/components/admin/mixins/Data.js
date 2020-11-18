export default {
    data: function () {
        return {
            // loading: true,
            model: {
                data: {},
            },
            dataGetUrl: null,
            dataPutUrl: null,
            dataPostUrl: null,
            dataDeleteUrl: null,
            dataPostBackUrl: null, //URL для перехода после успешного POST'а
            dataUploadImageUrl: '/api/image',
            dataUploadImageProgress: [],
            dataUploadFileUrl: '/api/file',
            dataUploadFileProgress: [],
        }
    },
    methods: {
        get: async function (url) {
            let apiToken = sessionStorage.getItem('api_token');
            console.log(url);

            return await fetch(url, {
                method: 'GET', // *GET, POST, PUT, DELETE, etc.
                mode: 'cors', // no-cors, cors, *same-origin
                cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
                // credentials: 'same-origin', // include, *same-origin, omit
                headers: {
                    'Authorization': `Bearer ${apiToken}`,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                redirect: 'follow', // manual, *follow, error
                referrer: 'no-referrer', // no-referrer, *client
            }).then(response => {
                // console.log(response);
                return response.json();
            });
        },
        post: async function (url, model) {
            let apiToken = sessionStorage.getItem('api_token');

            return await fetch(url, {
                method: 'POST',
                body: JSON.stringify(model),
                headers: {
                    'Authorization': `Bearer ${apiToken}`,
                    'Content-type': 'application/json',
                }
            }).then(response => {
                return response.json();
            });
        },
        put: async function (url, model) {
            let apiToken = sessionStorage.getItem('api_token');

            return await fetch(url, {
                method: 'PUT',
                body: JSON.stringify(model),
                headers: {
                    'Authorization': `Bearer ${apiToken}`,
                    'Content-type': 'application/json',
                }
            }).then(response => {
                return response.json();
            });
        },

        del: async function (url) {
            let apiToken = sessionStorage.getItem('api_token');

            let response = await fetch(url, {
                method: 'DELETE',
                // body: JSON.stringify(model),
                headers: {
                    'Authorization': `Bearer ${apiToken}`,
                    'Content-type': 'application/json',
                }
            }).then(response => {
                return response.json();
            });

            this.$set(this.model, 'data', response.data);
        },
        submit: async function () {
            if (this.$route.params.id == 'create') {
                console.log(this.dataPostUrl);
                let response = await this.post(this.dataPostUrl, this.model.data);
                console.log(response);
                let dataPostBackUrl = this.dataUrl.replace(/^\/api/, '') + '/' + response.data.id;

                // this.$router.push(dataPostBackUrl);
            } else {
                let response = await this.put(this.dataPutUrl, this.model.data);
                this.$set(this, 'model', response);
            }
        },
    }
    ,
    async mounted() {
        //Data URL's
        if (this.dataUrl) {
            this.dataGetUrl = this.dataUrl + '/' + this.$route.params.id;
            this.dataPutUrl = this.dataUrl + '/' + this.$route.params.id;
            this.dataPostUrl = this.dataUrl;
            this.dataDeleteUrl = this.dataUrl;
        }
        if (this.$route.params.id != 'create' && this.dataGetUrl) {
            let response = await this.get(this.dataGetUrl);
            this.$set(this.model, 'data', response.data);
            this.dataPutUrl = this.dataGetUrl;
        }
    },
}
