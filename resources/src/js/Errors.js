class Errors {
    /**
     * generate errors
     */
    constructor() {
        this.errors = {}
    }

    /**
     * record the errors
     * 
     * @param {*} errors 
     */
    record(errors) {
        this.errors = errors
    }

    /**
     * get specific error
     * 
     * @param {*} field 
     */
    get(field) {
        if(this.errors[field]) {
            return this.errors[field][0]
        }
    }

    /**
     * check for existance of specific error
     * 
     * @param {*} field 
     */
    has(field) {
        return this.errors.hasOwnProperty(field)
    }


    /**
     * check for any errors exist
     */
    any() {
        return Object.keys(this.errors).length > 0
    }

    /**
     * clear specific error
     * 
     * @param {*} field 
     */
    clear(field) {
        if(this.errors[field]) {
            delete this.errors[field]
        }
    }
}

export default Errors