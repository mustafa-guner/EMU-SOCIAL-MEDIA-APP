class LocalRepository {
    static createRepository(id, value) {
        return window.localStorage.setItem(id, JSON.stringify(value));
    }
    static removeRepositoryByID(id) {
        return window.localStorage.removeItem(id);
    }

    static getValueFromRepositoryByID(key) {
        return JSON.parse(window.localStorage.getItem(key));
    }
}