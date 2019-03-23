import Errors from './Errors'

window.Error = Errors

class Form {
    /**
     * 
     * @param {*} data 
     */
    constructor(data) {
        this.originalData = data

        this.errors = new Errors()

        for (let field in this.originalData) {
            this[field] = this.originalData[field]
        }
    }

    /**
     * name: 'name'
     * description: 'description'
     * errors: {}
     * originalData: { name: 'name', description: 'description'}
     * data = { name : 'name', description: 'description' }
     */
    data() {
        let data = {}
        for (let field in this.originalData) {
            data[field] = this[field]
        }
        return data
    }

    /**
     * 
     */
    reset() {
        for (let field in this.originalData) {
            delete this[field]
        }
    }

    /**
     * 
     * @param {*} requestType 
     * @param {*} url 
     */
    submit(requestType, url) {
        return new Promise((resolve, reject) => {
            axios[requestType](url, this.data())
                .then(response => {
                    resolve(response.data)
                })
                .catch(error => {
                    this.fail(error.response.data.errors)
                    reject(error.response.data)
                })
        })            
    }

    /**
     * 
     * @param {*} data 
     */
    success() {
        this.reset()
    }

    /**
     * 
     */
    fail(error) {
        this.errors.record(error)
    }

    /**
     * 
     * @param {*} url 
     */
    post(url) {
        return this.submit('post', url)
    }

    /**
     * 
     * @param {*} url 
     */
    get(url) {
        return this.submit('get', url)
    }

    /**
     * 
     * @param {*} url 
     */
    delete(url) {
        return this.submit('delete', url)
    }

    /**
     * 
     * @param {*} url 
     */
    put(url) {
        return this.submit('put', url)
    }

    /**
     * 
     * @param {*} url 
     */
    patch(url) {
        return this.patch('patch', url)
    }
}

export default Form