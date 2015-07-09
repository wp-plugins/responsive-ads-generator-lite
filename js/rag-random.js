 /**
 * jQuery Custom Script v0.1
 * Client-side random fields with jQuery
 *
 *
 */
   jQuery("#rag-block").append(jQuery("#rag-block ul").children().sort(function () {
    return Math.random() - 0.5;
}));