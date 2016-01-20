$(document).ready(function () { 

    

    $("#save-new-category-form").click(function (event) {
        
        $.ajax({
            type: "POST",
            
            url: baseUrl() + '/components/addNewCategory',

            data: $("#create-new-category-form").serialize(),

            dataType: 'json',

            error: function (jqXHR, textStatus, errorThrown) {
                // If the request fails, throw a notification.
                alert(textStatus + ': ' + jqXHR.status + ' ' + errorThrown);

            },

            success: function (msg) {
                if (msg.notification === "Validation error") {
                    $("#err-category").text(msg.error.category );
            } else {
                    clearFormFields("#create-new-category-form");
                    window.location.replace( baseUrl() + '/components/categories');
                  
                  }
            }
        });
    });
    $("#save-new-market-form").click(function (event) {
        
        $.ajax({
            type: "POST",
            
            url: baseUrl() + '/components/addNewMarket',

            data: $("#create-new-market-form").serialize(),

            dataType: 'json',

            error: function (jqXHR, textStatus, errorThrown) {
                // If the request fails, throw a notification.
                alert(textStatus + ': ' + jqXHR.status + ' ' + errorThrown);

            },

            success: function (msg) {
                if (msg.notification === "Validation error") {
                    $("#err-marketNAME").text(msg.error.marketNAME );
                    $("#err-address").text(msg.error.address );
                    $("#err-longitude").text(msg.error.longitude );
                    $("#err-latitude").text(msg.error.latitude );
                    $("#err-place").text(msg.error.place );
            } else {
                    clearFormFields("#create-new-market-form");
                    window.location.replace( baseUrl() + '/components/markets');
                  
                  }
            }
        });
    });
    $("#save-new-place-form").click(function (event) {
        
        $.ajax({
            type: "POST",
            
            url: baseUrl() + '/components/addNewPlace',

            data: $("#create-new-place-form").serialize(),

            dataType: 'json',

            error: function (jqXHR, textStatus, errorThrown) {
                // If the request fails, throw a notification.
                alert(textStatus + ': ' + jqXHR.status + ' ' + errorThrown);

            },

            success: function (msg) {
                if (msg.notification === "Validation error") {
                    $("#err-placeNAME").text(msg.error.placeNAME );
            } else {
                    clearFormFields("#create-new-place-form");
                    window.location.replace( baseUrl() + '/components/places');
                  
                  }
            }
        });
    });
    $("#save-new-product-form").click(function (event) {
        
        $.ajax({
            type: "POST",
            
            url: baseUrl() + '/components/addNewProduct',

            data: $("#create-new-product-form").serialize(),

            dataType: 'json',

            error: function (jqXHR, textStatus, errorThrown) {
                // If the request fails, throw a notification.
                alert(textStatus + ': ' + jqXHR.status + ' ' + errorThrown);

            },

            success: function (msg) {
                if (msg.notification === "Validation error") {
                    $("#err-name").text(msg.error.name );
                    $("#err-description").text(msg.error.description );
                    $("#err-imageURL").text(msg.error.imageURL );
                    $("#err-categoryID").text(msg.error.categoryID );
            } else {
                    clearFormFields("#create-new-product-form");
                    window.location.replace( baseUrl() + '/components/products');
                  
                  }
            }
        });
    });
    $("#save-new-unitofmeasure-form").click(function (event) {
        
        $.ajax({
            type: "POST",
            
            url: baseUrl() + '/components/addNewUOM',

            data: $("#create-new-unitofmeasure-form").serialize(),

            dataType: 'json',

            error: function (jqXHR, textStatus, errorThrown) {
                // If the request fails, throw a notification.
                alert(textStatus + ': ' + jqXHR.status + ' ' + errorThrown);

            },

            success: function (msg) {
                if (msg.notification === "Validation error") {
                    $("#err-unitofmeasure").text(msg.error.unitofmeasure );
            } else {
                    clearFormFields("#create-new-unitofmeasure-form");
                    window.location.replace( baseUrl() + '/components/uom');
                  
                  }
            }
        });
    });
    $("#save-new-user-form").click(function (event) {
        console.log('Tap!');
        $.ajax({
            type: "POST",
            
            url: baseUrl() + '/components/addNewUser',

            data: $("#create-new-user-form").serialize(),

            dataType: 'json',

            error: function (jqXHR, textStatus, errorThrown) {
                // If the request fails, throw a notification.
                alert(textStatus + ': ' + jqXHR.status + ' ' + errorThrown);

            },

            success: function (msg) {
                if (msg.notification === "Validation error") {
                    $("#err-userNAME").text(msg.error.userNAME );
                    $("#err-userPASSWORD").text(msg.error.userPASSWORD );
                    $("#err-employeeName").text(msg.error.employeeName );
            } else {
                    clearFormFields("#create-new-user-form");
                    window.location.replace( baseUrl() + '/components/users');
                  
                  }
            }
        });
    });
    $("#save-new-priceupdate-form").click(function (event) {
        console.log('Tap!');
        $.ajax({
            type: "POST",
            
            url: baseUrl() + '/province/addNewUpdatePrice',

            data: $("#create-new-priceupdate-form").serialize(),

            dataType: 'json',

            error: function (jqXHR, textStatus, errorThrown) {
                // If the request fails, throw a notification.
                alert(textStatus + ': ' + jqXHR.status + ' ' + errorThrown);

            },

            success: function (msg) {
                if (msg.notification === "Validation error") {
                    $("#err-productID").text(msg.error.productID );
                    $("#err-price").text(msg.error.price );
                    $("#err-unitofmeasureID").text(msg.error.unitofmeasureID );
                    $("#err-province_updateID").text(msg.error.province_updateID );
            } else {
                    clearFormFields("#create-new-priceupdate-form");
                    location.reload();
                  
                  }
            }
        });
    });
    $("#save-new-upload-form").click(function (event) {
        console.log('Tap!');
        $.ajax({
            type: "POST",
            
            url: baseUrl() + '/province/Upload',

            data: $("#create-new-upload-form").serialize(),

            dataType: 'json',

            error: function (jqXHR, textStatus, errorThrown) {
                // If the request fails, throw a notification.
                alert(textStatus + ': ' + jqXHR.status + ' ' + errorThrown);

            },

            success: function (msg) {
                if (msg.notification === "Validation error") {
                    $("#err-date_start").text(msg.error.date_start );
                    $("#err-date_end").text(msg.error.date_end );
            } else {
                    clearFormFields("#create-new-upload-form");
                   
                  
                  }
            }
        });
    });
    $("#save-new-update-form").click(function (event) {
        console.log('clicked!');
        $.ajax({
            type: "POST",
            
            url: baseUrl() + '/province/addNewUpdate',

            data: $("#create-new-update-form").serialize(),

            dataType: 'json',

            error: function (jqXHR, textStatus, errorThrown) {
                // If the request fails, throw a notification.
                alert(textStatus + ': ' + jqXHR.status + ' ' + errorThrown);

            },

            success: function (msg) {
                if (msg.notification === "Validation error") {
                    $("#err-place").text(msg.error.place );
                    $("#err-productID").text(msg.error.productID );
                    $("#err-price").text(msg.error.price );
                    $("#err-unitofmeasureID").text(msg.error.unitofmeasureID );
            } else {
                    clearFormFields("#create-new-update-form");
                    window.location.replace( baseUrl() + '/province/Updates');
                  
                  }
            }
        });
    });
});