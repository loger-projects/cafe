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
     * 
     */
    data() {
        let data = {}
        for (let field in this.originalData) {
            data[this.field] = this.originalData[field]
        }
        return data
    }

    /**
     * 
     */
    reset() {
        for (let field in this.originalData) {
            this[field] = ''
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
                    this.success(response.data)
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
    success(data) {
        this.reset()
        alert(data.message)
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