const CustomError = require("./CustomError");
module.exports = {
    blogCreationInputValidation: (fields) => {
        let result = { success: true, errors: [] };

        //Try this feature. If you dont like make errors array
        //push each error to in and display each

        const { title, content, postType } = fields;

        if (!title || title === "undefined" || title.length === 0) {
            result.success = false;
            result.errors.push("Title is required.");
        }

        if (!content || content === "undefined" || content.length < 10) {
            result.success = false;
            result.errors.push("Content is too short.");
        }

        if (!postType ||
            postType === "undefined" || ["announcement", "blog", "jobPost"].indexOf(postType) < 0
        ) {
            result.success = false;

            result.errors.push("Please select your post type.");
        }

        // if (
        //   !categories ||
        //   categories === "undefined" ||
        //   !fields.categories.length === 0
        // ) {
        //   result.success = false;
        //   result.error = "At least one category is required.";
        //    return result;
        // }

        // if (!fields.tags || tags === "undefined" || !fields.tags.length === 0) {
        //   result.success = false;
        //   result.error = "At least one tag is required.";
        // //   return result;
        // }

        return result;
    },

    smartTrim: (str, length, delim, appendix) => {
        if ((str, length <= length)) return str;

        let trimmedStr = str.substr(0, length + delim + length);

        let lastDelimIndex = trimmedStr.lastIndexOf(delim);

        if (lastDelimIndex >= 0) trimmedStr = trimmedStr.substr(0, lastDelimIndex);

        if (trimmedStr) trimmedStr += appendix;

        return trimmedStr;
    },
};