$(document).ready(function () {
    //get servicesupplier_id by url
    var servicesupplier_id = window.location.href.split("/").pop();

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    //add add_service button
    $("#add_service").click(function () {
        //show modal serviceModal
        $("#serviceModal").modal("show");
        //get url
        var url = baseurl + "/addservices-supplier";
        //add url to form
        $("#formservicesupplier").attr("action", url);
    });

    $("#formservicesupplier").submit(function (e) {
        e.preventDefault();
        var url = $(this).attr("action");

        var formData = new FormData($("#formservicesupplier")[0]);

        var routes = [];
        $("#listroutes .card").each(function () {
            //if exist input route_id then add route_id to routes array
            if ($(this).find('input[name="route_id[]"]').length > 0) {
                var route_id = $(this).find('input[name="route_id[]"]').val();
            } else {
                var route_id = null;
            }
            var originCountry = $(this)
                .find('select[name="origin_country_id[]"]')
                .val();
            var originState = $(this)
                .find('select[name="origin_state_id[]"]')
                .val();
            var originCity = $(this).find('input[name="origin_city[]"]').val();
            var destinationCountry = $(this)
                .find('select[name="destination_country_id[]"]')
                .val();
            var destinationState = $(this)
                .find('select[name="destination_state_id[]"]')
                .val();
            var destinationCity = $(this)
                .find('input[name="destination_city[]"]')
                .val();
            var crossing = $(this).find('select[name="crossing[]"]').val();
            var returnRoute = $(this)
                .find('input[name="return_route[]"]')
                .is(":checked");

            var route = {
                route_id: route_id,
                origin_country_id: originCountry,
                origin_state_id: originState,
                origin_city: originCity,
                destination_country_id: destinationCountry,
                destination_state_id: destinationState,
                destination_city: destinationCity,
                crossing: crossing,
                return_route: returnRoute,
            };

            routes.push(route);
        });

        formData.append("routes", JSON.stringify(routes));

        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                if (data.success == true) {
                    $("#serviceModal").modal("hide");
                    $("#formservicesupplier")[0].reset();
                    getServices(servicesupplier_id);
                } else {
                    alert("Error: " + data.message);
                }
            },
        });
    });

    //click add_route button
    $("#add_route").click(function () {
        var n = $(".routeitem").length + 1;
        //get html
        var html =
            '<div class="col-md-6 routeitem mb-2">' +
            '<div class="card p-1">' +
            '<button type="button" class="btn btn-danger p-0 btn-sm remove_route">X</button>' +
            '<div class="card-body p-2">' +
            '<div class="row">' +
            '<div class="col-md-6">' +
            '<label class="form-label fw-bold">Origin:</label>' +
            '<div class="form-group mt-1 mb-1">' +
            '<select class="form-control" name="origin_country_id[]" required="">' +
            "</select>" +
            "</div>" +
            '<div class="form-group mt-1 mb-1">' +
            '<select class="form-control" name="origin_state_id[]">' +
            '<option value="">State</option>' +
            "</select>" +
            "</div>" +
            '<div class="form-group mt-1 mb-1">' +
            '<input type="text" name="origin_city[]" class="form-control form-control-sm" value="" placeholder="City">' +
            "</div>" +
            "</div>" +
            '<div class="col-md-6">' +
            '<label class="form-label fw-bold">Destination:</label>' +
            '<div class="form-group mt-1 mb-1">' +
            '<select class="form-control" name="destination_country_id[]" required="">' +
            '<option value="">Country</option>' +
            "</select>" +
            "</div>" +
            '<div class="form-group mt-1 mb-1">' +
            '<select class="form-control" name="destination_state_id[]">' +
            '<option value="">State</option>' +
            "</select>" +
            "</div>" +
            '<div class="form-group mt-1 mb-1">' +
            '<input type="text" name="destination_city[]" class="form-control form-control-sm" value="" placeholder="City">' +
            "</div>" +
            "</div>" +
            "</div>" +
            '<div class="row form-group mb-1 rowcrossing d-none">' +
            '<div class="col-md-12">' +
            '<select class="form-control" name="crossing[]">' +
            '<option value="">Crossing</option>' +
            "</select>" +
            "</div>" +
            "</div>" +
            '<div class="row form-group mb-1">' +
            '<hr class="mt-1 mb-1">' +
            '<div class="col-md-12">' +
            '<div class="form-check">' +
            '<input class="form-check-input" name="return_route[]" type="checkbox" id="rtreturn' +
            n +
            '">' +
            '<label class="form-check-label" for="rtreturn' +
            n +
            '"> Return</label>' +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>";
        //append html to #listroutes
        $("#listroutes").append(html);

        //add country select to origin_country_id by ajax
        $.ajax({
            url: baseurl + "/getcountry",
            type: "GET",
            success: function (data) {
                var html = '<option value="">Country...</option>';
                data.forEach((element) => {
                    html +=
                        '<option value="' +
                        element.id +
                        '">' +
                        element.name +
                        "</option>";
                });

                //add in this route
                $(
                    '.routeitem:last-child select[name="origin_country_id[]"]'
                ).html(html);
                $(
                    '.routeitem:last-child select[name="destination_country_id[]"]'
                ).html(html);
            },
        });
    });

    //click add_location button
    $("#add_location").click(function () {
        var servicesList = JSON.parse(
            $('input[name="services_list"]').val() || "[]"
        );

        var hasValue24 = servicesList.some(function (service) {
            return service.value === "24";
        });

        if (hasValue24) {
            var selected_country_id = 142;
            var displaycrossing = "";
            var showfor_mcb = "d-none";
        } else {
            var selected_country_id = "";
            var displaycrossing = "d-none";
            var showfor_mcb = "";
        }

        var n = $(".routeitem").length + 1;
        //get html
        var html =
            '<div class="col-md-4 routeitem mb-2">' +
            '<div class="card p-1">' +
            '<button type="button" class="btn btn-danger p-0 btn-sm remove_route">X</button>' +
            '<div class="card-body p-2">' +
            '<div class="row">' +
            '<div class="col-md-12">' +
            '<div class="form-group mt-1 mb-1 ' +
            showfor_mcb +
            '">' +
            '<select class="form-control" name="origin_country_id[]" required="">' +
            "</select>" +
            "</div>" +
            '<div class="form-group mt-1 mb-1 ' +
            showfor_mcb +
            '">' +
            '<select class="form-control" name="origin_state_id[]">' +
            '<option value="">State</option>' +
            "</select>" +
            "</div>" +
            '<div class="form-group mt-1 mb-1 ' +
            showfor_mcb +
            '">' +
            '<input type="text" name="origin_city[]" class="form-control form-control-sm" value="" placeholder="City">' +
            "</div>" +
            "</div>" +
            '<div class="col-md-12 d-none">' +
            '<div class="form-group mt-1 mb-1">' +
            '<select class="form-control" name="destination_country_id[]">' +
            '<option value="">Country</option>' +
            "</select>" +
            "</div>" +
            '<div class="form-group mt-1 mb-1">' +
            '<select class="form-control" name="destination_state_id[]">' +
            '<option value="">State</option>' +
            "</select>" +
            "</div>" +
            '<div class="form-group mt-1 mb-1">' +
            '<input type="text" name="destination_city[]" class="form-control form-control-sm" value="" placeholder="City">' +
            "</div>" +
            "</div>" +
            "</div>" +
            '<div class="row form-group mb-1 rowcrossing ' +
            displaycrossing +
            '">' +
            '<div class="col-md-12">' +
            '<select class="form-control" name="crossing[]">' +
            '<option value="">Crossing</option>' +
            "</select>" +
            "</div>" +
            "</div>" +
            '<div class="row form-group mb-1 d-none">' +
            '<hr class="mt-1 mb-1">' +
            '<div class="col-md-12">' +
            '<div class="form-check">' +
            '<input class="form-check-input" name="return_route[]" type="checkbox" id="rtreturn' +
            n +
            '">' +
            '<label class="form-check-label" for="rtreturn' +
            n +
            '"> Return</label>' +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>";
        //append html to #listroutes
        $("#listroutes").append(html);

        //add country select to origin_country_id by ajax
        $.ajax({
            url: baseurl + "/getcountry",
            type: "GET",
            success: function (data) {
                var html = '<option value="">Country...</option>';
                data.forEach((element) => {
                    if (element.id == selected_country_id) {
                        var selected = 'selected="selected"';
                    } else {
                        var selected = "";
                    }

                    html +=
                        '<option value="' +
                        element.id +
                        '" ' +
                        selected +
                        " >" +
                        element.name +
                        "</option>";
                });

                //add in this route
                $(
                    '.routeitem:last-child select[name="origin_country_id[]"]'
                ).html(html);

                //list crossing if selected_country_id = 142
                if (selected_country_id == 142) {
                    $.ajax({
                        url: baseurl + "/getcrossing/" + "142",
                        type: "GET",
                        success: function (data) {
                            if (data.length > 0) {
                                var html =
                                    '<option value="">Crossing...</option>';
                                data.forEach((element) => {
                                    html +=
                                        '<option value="' +
                                        element.id +
                                        '">' +
                                        element.crossing_name +
                                        "</option>";
                                });
                                //add in this route
                                $(
                                    '.routeitem:last-child select[name="crossing[]"]'
                                ).html(html);
                            }
                        },
                    });
                }
            },
        });
    });

    //click in remove_route button
    $(document).on("click", ".remove_route", function () {
        $(this).closest(".routeitem").remove();
        //enumerate routes return_route[] and label class form-check-label for
        $(".routeitem").each(function (index) {
            var n = index + 1;
            $(this)
                .find('input[name="return_route[]"]')
                .attr("id", "rtreturn" + n);
            $(this)
                .find("label.form-check-label")
                .attr("for", "rtreturn" + n);
        });
    });

    //click in origin_country_id[] select add state select
    $(document).on("change", 'select[name="origin_country_id[]"]', function () {
        var country_id = $(this).val();
        var routeitem = $(this).closest(".routeitem");
        $.ajax({
            url: baseurl + "/getstates/" + country_id,
            type: "GET",
            success: function (data) {
                if (data.length > 0) {
                    var html = '<option value="">State...</option>';
                    data.forEach((element) => {
                        html +=
                            '<option value="' +
                            element.id +
                            '">' +
                            element.name +
                            "</option>";
                    });
                    routeitem
                        .find('select[name="origin_state_id[]"]')
                        .html(html);
                    crossinglist_mex_cana_usa(routeitem);
                } else {
                    routeitem
                        .find('select[name="origin_state_id[]"]')
                        .html('<option value="">No state</option>');
                }
            },
        });
    });

    function crossinglist_mex_cana_usa(routeitem) {
        var serviceCategoryId = $('select[name="servicecategory_id"]').val();
        var servicesList = JSON.parse(
            $('input[name="services_list"]').val() || "[]"
        );

        var hasValue24 = servicesList.some(function (service) {
            return service.value === "24";
        });

        var CountryOriginId = routeitem
            .find('select[name="origin_country_id[]"]')
            .val();
        var CountryDestinationId = routeitem
            .find('select[name="destination_country_id[]"]')
            .val();

        if (serviceCategoryId == "1") {
            if (
                (CountryOriginId === "142" &&
                    (CountryDestinationId === "38" ||
                        CountryDestinationId === "231")) ||
                ((CountryOriginId === "38" || CountryOriginId === "231") &&
                    CountryDestinationId === "142")
            ) {
                $.ajax({
                    url: baseurl + "/getcrossing/" + "142",
                    type: "GET",
                    success: function (data) {
                        if (data.length > 0) {
                            var html = '<option value="">Crossing...</option>';
                            data.forEach((element) => {
                                html +=
                                    '<option value="' +
                                    element.id +
                                    '">' +
                                    element.crossing_name +
                                    "</option>";
                            });
                            routeitem
                                .find('select[name="crossing[]"]')
                                .html(html);
                            routeitem
                                .find(".rowcrossing")
                                .removeClass("d-none");
                        }
                    },
                });
            } else {
                html = '<option value="">Crossing...</option>';
                routeitem.find('select[name="crossing[]"]').html(html);
                routeitem.find(".rowcrossing").addClass("d-none");
            }
        }

        if (serviceCategoryId === "4") {
            // Almacenamos el select de 'crossing[]' en una variable
            const crossingSelect = routeitem.find('select[name="crossing[]"]');

            // Inicializamos la variable 'html' con el valor predeterminado
            let html = '<option value="">Crossing...</option>';

            if (CountryOriginId === "142") {
                $.ajax({
                    url: `${baseurl}/getcrossing/142`,
                    type: "GET",
                    success: function (data) {
                        if (data.length > 0) {
                            data.forEach((element) => {
                                // Usamos plantillas literales para construir las opciones del select
                                html += `<option value="${element.id}">${element.crossing_name}</option>`;
                            });
                            crossingSelect.html(html);

                            // Mostramos la sección de 'crossing' si hay datos disponibles
                            routeitem
                                .find(".rowcrossing")
                                .removeClass("d-none");
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error("Error al obtener los cruces:", error);
                        // Opcionalmente, aquí puedes manejar el error (por ejemplo, mostrar un mensaje de error al usuario).
                    },
                });
            } else {
                // Si no se cumple la condición, restablecemos las opciones del select
                crossingSelect.html(html);

                // Ocultamos la sección de 'crossing'
                routeitem.find(".rowcrossing").addClass("d-none");
            }
        }

        if (hasValue24) {
            if (CountryOriginId === "142") {
                $.ajax({
                    url: baseurl + "/getcrossing/" + "142",
                    type: "GET",
                    success: function (data) {
                        if (data.length > 0) {
                            var html = '<option value="">Crossing...</option>';
                            data.forEach((element) => {
                                html +=
                                    '<option value="' +
                                    element.id +
                                    '">' +
                                    element.crossing_name +
                                    "</option>";
                            });
                            routeitem
                                .find('select[name="crossing[]"]')
                                .html(html);
                            routeitem
                                .find(".rowcrossing")
                                .removeClass("d-none");
                        }
                    },
                });
            } else {
                html = '<option value="">Crossing...</option>';
                routeitem.find('select[name="crossing[]"]').html(html);
                routeitem.find(".rowcrossing").addClass("d-none");
            }
        }
    }

    //click in destination_country_id[] select add state select
    $(document).on(
        "change",
        'select[name="destination_country_id[]"]',
        function () {
            var country_id = $(this).val();
            var routeitem = $(this).closest(".routeitem");
            $.ajax({
                url: baseurl + "/getstates/" + country_id,
                type: "GET",
                success: function (data) {
                    if (data.length > 0) {
                        var html = '<option value="">State...</option>';
                        data.forEach((element) => {
                            html +=
                                '<option value="' +
                                element.id +
                                '">' +
                                element.name +
                                "</option>";
                        });
                        routeitem
                            .find('select[name="destination_state_id[]"]')
                            .html(html);
                        crossinglist_mex_cana_usa(routeitem);
                    } else {
                        routeitem
                            .find('select[name="destination_state_id[]"]')
                            .html('<option value="">No state</option>');
                    }
                },
            });
        }
    );

    //function get list services by servicesupplier_id
    function getServices(servicesupplier_id) {
        $.ajax({
            url: baseurl + "/getservices/" + servicesupplier_id,
            type: "GET",
            success: function (data) {
                var dvelemt = $("#listservices");
                dvelemt.html("");
                var htmlArray = [];

                if (data.length > 0) {
                    // Generar los elementos de la lista
                    for (var i = 0; i < data.length; i++) {
                        var item = data[i];
                        var services = JSON.parse(item.services_list);
                        var serviceBadges = [];

                        // item.routes is array of routes
                        var routes = item.routes;
                        var routeItems = [];

                        // Generar los badges de servicios
                        for (var j = 0; j < services.length; j++) {
                            var service = services[j];
                            serviceBadges.push(
                                '<span class="badge badge-light-danger mb-1 me-1">' +
                                    service.name +
                                    "</span>"
                            );
                        }

                        // Generar los items de rutas
                        for (var k = 0; k < routes.length; k++) {
                            var route = routes[k];

                            var origin_country_name = route.origin_country_name;
                            var origin_state_name = route.origin_state_name
                                ? ", " + route.origin_state_name
                                : "";
                            var origin_city_name = route.origin_city
                                ? ", " + route.origin_city
                                : "";

                            var destination_country_name =
                                route.destination_country_name;
                            var destination_state_name =
                                route.destination_state_name
                                    ? ", " + route.destination_state_name
                                    : "";
                            var destination_city_name = route.destination_city
                                ? ", " + route.destination_city
                                : "";
                            var crossing = route.crossing_name
                                ? "Crossing: " + route.crossing_name
                                : "";

                            var icon = route.return_route == 1 ? "↔" : "→";

                            var routeItem =
                                origin_country_name +
                                origin_state_name +
                                origin_city_name;

                            if (
                                destination_country_name ||
                                destination_state_name ||
                                destination_city_name
                            ) {
                                routeItem += " <b>" + icon + "</b> ";

                                if (destination_country_name) {
                                    routeItem += destination_country_name;
                                }
                                if (destination_state_name) {
                                    routeItem += destination_state_name;
                                }
                                if (destination_city_name) {
                                    routeItem += destination_city_name;
                                }
                            }

                            if (crossing) {
                                routeItem += "<br>" + crossing;
                            }

                            routeItems.push(
                                '<label class="list-group-item">' +
                                    routeItem +
                                    "</label>"
                            );
                        }

                        htmlArray.push(
                            '<div class="col-md-6 mb-2">' +
                                '<div class="card style-4">' +
                                '<div class="card-body p-2">' +
                                '<div class="m-o-dropdown-list">' +
                                '<div class="media mt-0 mb-0">' +
                                '<div class="badge--group me-3">' +
                                '<div class="badge badge-dot" style="background-color:' +
                                item.category_color +
                                '"></div>' +
                                "</div>" +
                                '<div class="media-body">' +
                                '<h4 class="media-heading mb-0">' +
                                '<span class="media-title">' +
                                item.category_name +
                                "</span>" +
                                '<div class="dropdown-list dropdown" role="group">' +
                                '<a href="javascript:void(0);" class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                                '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>' +
                                "</a>" +
                                '<div class="dropdown-menu left" style="">' +
                                '<a class="dropdown-item editservice" data-id="' +
                                item.id +
                                '" href="javascript:void(0);"><span>Editar</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a>' +
                                '<a class="dropdown-item deleteservice" data-id="' +
                                item.id +
                                '" href="javascript:void(0);"><span>Delete</span> <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a>' +
                                "</div>" +
                                "</div>" +
                                "</h4>" +
                                "</div>" +
                                "</div>" +
                                "</div>" +
                                '<hr class="mt-1 mb-1">' +
                                serviceBadges.join("") +
                                '<div class="list-group">' +
                                routeItems.join("") +
                                "</div>" +
                                "</div>" +
                                "</div>" +
                                "</div>"
                        );
                    }

                    dvelemt.append(htmlArray.join(""));
                } else {
                    dvelemt.html(
                        '<div class="col-md-12"><div class="alert alert-danger">No services</div></div>'
                    );
                }
            },
        });
    }

    getServices(servicesupplier_id);

    // Editar servicio
    $(document).on("click", ".editservice", function () {
        $("#listroutes").html(
            '<div class="text-center"><div class="spinner-grow text-warning align-self-center"></div></div>'
        );

        var id = $(this).data("id");
        $("#serviceModal").modal("show");

        var url = baseurl + "/updateservices-supplier";
        $("#formservicesupplier").attr("action", url);

        $.ajax({
            url: baseurl + "/servicesupplieredit",
            type: "GET",
            data: {
                id: id,
            },
            dataType: "json",
            success: function (response) {
                $('input[name="service_supplier_id"]').val(
                    response.servicesupplier.id
                );
                $("#servicecategory_id").val(
                    response.servicesupplier.servicecategory_id
                );
                var services_list = JSON.parse(
                    response.servicesupplier.services_list
                );
                var services_list_name = [];
                for (var i = 0; i < services_list.length; i++) {
                    services_list_name.push(services_list[i].name);
                }

                var serviceCategoryId =
                    response.servicesupplier.servicecategory_id;

                if (serviceCategoryId == 4) {
                    var servicesList = JSON.parse(
                        response.servicesupplier.services_list || "[]"
                    );
                    var hasValue24 = servicesList.some(function (service) {
                        return service.value === "24";
                    });
                    var showfor_mcb = hasValue24 ? "d-none" : "";
                } else {
                }

                fetchWhitelistData(serviceCategoryId).then(function (data) {
                    usrList.settings.whitelist = data;
                    usrList.dropdown.hide();

                    var inputServicesList = $('input[name="services_list"]');
                    inputServicesList.val(services_list_name.join(", "));

                    var tagify = new Tagify(inputServicesList[0]);

                    inputServicesList[0].addEventListener(
                        "add",
                        function (event) {
                            var tags = tagify.value.map(function (item) {
                                return item.value;
                            });
                            inputServicesList.val(tags.join(", "));
                        }
                    );
                });

                var routes = response.routes;
                var routeItems = [];
                var n = 1;

                // Obtener países por AJAX
                $.ajax({
                    url: baseurl + "/getcountry",
                    type: "GET",
                    success: function (data) {
                        var html = '<option value="">Country...</option>';
                        $.each(data, function (index, element) {
                            html +=
                                '<option value="' +
                                element.id +
                                '">' +
                                element.name +
                                "</option>";
                        });

                        // Construir las rutas
                        for (var i = 0; i < routes.length; i++) {
                            var route = routes[i];
                            var selectedOrigin = route.origin_country;
                            var selectedDestination = route.destination_country;
                            var originStateSelect = "";
                            var destinationStateSelect = "";

                            //get state by selectedOrigin
                            $.ajax({
                                url: baseurl + "/getstates/" + selectedOrigin,
                                type: "GET",
                                async: false,
                                success: function (data) {
                                    var html =
                                        '<option value="">State...</option>';
                                    $.each(data, function (index, element) {
                                        if (element.id == route.origin_state) {
                                            html +=
                                                '<option value="' +
                                                element.id +
                                                '" selected>' +
                                                element.name +
                                                "</option>";
                                        } else {
                                            html +=
                                                '<option value="' +
                                                element.id +
                                                '">' +
                                                element.name +
                                                "</option>";
                                        }
                                    });
                                    originStateSelect = html;
                                },
                            });

                            //get state by selectedDestination
                            if (selectedDestination != "") {
                                $.ajax({
                                    url:
                                        baseurl +
                                        "/getstates/" +
                                        selectedDestination,
                                    type: "GET",
                                    async: false,
                                    success: function (data) {
                                        var html =
                                            '<option value="">State...</option>';
                                        $.each(data, function (index, element) {
                                            if (
                                                element.id ==
                                                route.destination_state
                                            ) {
                                                html +=
                                                    '<option value="' +
                                                    element.id +
                                                    '" selected>' +
                                                    element.name +
                                                    "</option>";
                                            } else {
                                                html +=
                                                    '<option value="' +
                                                    element.id +
                                                    '">' +
                                                    element.name +
                                                    "</option>";
                                            }
                                        });
                                        destinationStateSelect = html;
                                    },
                                });
                            }

                            var displaycrossing = "d-none";
                            var crossingSelect = "";

                            if (
                                (selectedOrigin === "142" &&
                                    (selectedDestination === "38" ||
                                        selectedDestination === "231")) ||
                                ((selectedOrigin === "38" ||
                                    selectedOrigin === "231") &&
                                    selectedDestination === "142") ||
                                (selectedOrigin === "142" &&
                                    serviceCategoryId === "4")
                            ) {
                                $.ajax({
                                    url: baseurl + "/getcrossing/" + "142",
                                    type: "GET",
                                    async: false,
                                    success: function (data) {
                                        if (data.length > 0) {
                                            displaycrossing = "";
                                            var html =
                                                '<option value="">Crossing...</option>';
                                            data.forEach((element) => {
                                                if (
                                                    element.id == route.crossing
                                                ) {
                                                    html +=
                                                        '<option value="' +
                                                        element.id +
                                                        '" selected>' +
                                                        element.crossing_name +
                                                        "</option>";
                                                } else {
                                                    html +=
                                                        '<option value="' +
                                                        element.id +
                                                        '">' +
                                                        element.crossing_name +
                                                        "</option>";
                                                }
                                            });
                                            crossingSelect = html;
                                        }
                                    },
                                });
                            }

                            var checked =
                                route.return_route == "1" ? "checked" : "";
                            var routeNumber = "rtreturn" + (n + i);

                            var routeItem = `
                    <div class="col-md-6 routeitem mb-2">
                      <div class="card p-1">
                        <button type="button" class="btn btn-danger p-0 btn-sm remove_route">X</button>
                        <div class="card-body p-2">
                          <input type="hidden" name="route_id[]" value="${
                              route.id
                          }">
                          <div class="row">
                            <div class="col-md-6">
                              <label class="form-label fw-bold">Origin:</label>
                              <div class="form-group mt-1 mb-1">
                                <select class="form-control origin_country" name="origin_country_id[]" required="">
                                  ${html.replace(
                                      '<option value="' + selectedOrigin + '">',
                                      '<option value="' +
                                          selectedOrigin +
                                          '" selected>'
                                  )}
                                </select>
                              </div>
                              <div class="form-group mt-1 mb-1">
                                <select class="form-control origin_state" name="origin_state_id[]">
                                  ${originStateSelect}
                                </select>
                              </div>
                              <div class="form-group mt-1 mb-1">
                                <input type="text" name="origin_city[]" class="form-control form-control-sm" value="${
                                    route.origin_city
                                }" placeholder="City">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <label class="form-label fw-bold">Destination:</label>
                              <div class="form-group mt-1 mb-1">
                                <select class="form-control destination_country" name="destination_country_id[]" required="">
                                  ${html.replace(
                                      '<option value="' +
                                          selectedDestination +
                                          '">',
                                      '<option value="' +
                                          selectedDestination +
                                          '" selected>'
                                  )}
                                </select>
                              </div>
                              <div class="form-group mt-1 mb-1">
                                <select class="form-control destination_state" name="destination_state_id[]">
                                  ${destinationStateSelect}
                                </select>
                              </div>
                              <div class="form-group mt-1 mb-1">
                                <input type="text" name="destination_city[]" class="form-control form-control-sm" value="${
                                    route.destination_city
                                }" placeholder="City">
                              </div>
                            </div>
                          </div>
                          <div class="row form-group mb-1 rowcrossing ${displaycrossing}">
                            <div class="col-md-12">
                              <select class="form-control" name="crossing[]">
                                ${crossingSelect}
                              </select>
                            </div>
                          </div>
                          <div class="row form-group mb-1">
                            <hr class="mt-1 mb-1">
                            <div class="col-md-12">
                              <div class="form-check">
                                <input class="form-check-input" name="return_route[]" type="checkbox" id="${routeNumber}" ${checked}>
                                <label class="form-check-label" for="${routeNumber}"> Return</label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>`;

                            var listlocation = `
                    <div class="col-md-4 routeitem mb-2">
                      <div class="card p-1">
                        <button type="button" class="btn btn-danger p-0 btn-sm remove_route">X</button>
                        <div class="card-body p-2">
                          <input type="hidden" name="route_id[]" value="${
                              route.id
                          }">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group mt-1 mb-1 ${showfor_mcb}">
                                <select class="form-control" name="origin_country_id[]" required="">
                                    ${html.replace(
                                        '<option value="' +
                                            selectedOrigin +
                                            '">',
                                        '<option value="' +
                                            selectedOrigin +
                                            '" selected>'
                                    )}
                                </select>
                              </div>
                              <div class="form-group mt-1 mb-1 ${showfor_mcb}">
                                <select class="form-control" name="origin_state_id[]">
                                  ${originStateSelect}
                                </select>
                              </div>
                              <div class="form-group mt-1 mb-1 ${showfor_mcb}">
                                <input type="text" name="origin_city[]" class="form-control form-control-sm" value="${
                                    route.origin_city
                                }" placeholder="City">
                              </div>
                            </div>
                            <div class="col-md-12 d-none">
                              <div class="form-group mt-1 mb-1">
                                <select class="form-control" name="destination_country_id[]">
                                  <option value="">Country</option>
                                </select>
                              </div>
                              <div class="form-group mt-1 mb-1">
                                <select class="form-control" name="destination_state_id[]">
                                  <option value="">State</option>
                                </select>
                              </div>
                              <div class="form-group mt-1 mb-1">
                                <input type="text" name="destination_city[]" class="form-control form-control-sm" value="" placeholder="City">
                              </div>
                            </div>
                          </div>
                          <div class="row form-group mb-1 rowcrossing ${displaycrossing}">
                            <div class="col-md-12">
                              <select class="form-control" name="crossing[]">
                                ${crossingSelect}
                              </select>
                            </div>
                          </div>
                          <div class="row form-group mb-1 d-none">
                            <hr class="mt-1 mb-1">
                            <div class="col-md-12">
                              <div class="form-check">
                                <input class="form-check-input" name="return_route[]" type="checkbox" id="${routeNumber}" ${checked} >
                                <label class="form-check-label" for="${routeNumber}"> Return</label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>`;

                            if (serviceCategoryId == 4) {
                                routeItems.push(listlocation);
                            } else {
                                routeItems.push(routeItem);
                            }
                        }

                        $("#listroutes").html(routeItems);
                    },
                });
            },
            error: function () {
                alert("Error editing service");
            },
        });
    });

    // Eliminar servicio
    $(document).on("click", ".deleteservice", function () {
        var id = $(this).data("id");
        $.ajax({
            url: baseurl + "/servicesupplierdelete",
            type: "POST",
            data: {
                id: id,
            },
            success: function (response) {
                if (response.success == true) {
                    getServices(servicesupplier_id);
                }
            },
            error: function () {
                alert("Error deleting service");
            },
        });
    });

    //click class btn-close or discard_btn
    $(document).on("click", ".btn-close, .discard_btn", function () {
        //reset form
        $("#formservicesupplier").trigger("reset");

        $("#listroutes").html("");
    });
});

/**
 *
 * Service List
 *
 **/
var inputElm = document.querySelector("input[name=services_list]");

function tagTemplate(tagData) {
    return `
    <tag title="${tagData.servicecategory}"
            contenteditable='false'
            spellcheck='false'
            tabIndex="-1"
            class="tagify__tag ${tagData.class ? tagData.class : ""}"
            ${this.getAttributes(tagData)} >
        <x title='' class='tagify__tag__removeBtn' role='button' aria-label='remove tag'></x>
        <div>
            <div class='tagify__tag__avatar-wrap'>
                <img onerror="this.style.visibility='hidden'" src="https://www.latinamericancargo.com/wp-content/themes/lac_tema_2023/assets/res/img/icons/icon-hand.svg">
            </div>
            <span class='tagify__tag-text'>${tagData.name}</span>
        </div>
    </tag>
  `;
}

function suggestionItemTemplate(tagData) {
    return `
    <div ${this.getAttributes(tagData)}
        class='tagify__dropdown__item ${tagData.class ? tagData.class : ""}'
        tabindex="0"
        role="option">
        <div class='tagify__dropdown__item__avatar-wrap'>
            <img onerror="this.style.visibility='hidden'" src="https://www.latinamericancargo.com/wp-content/themes/lac_tema_2023/assets/res/img/icons/icon-hand.svg">
        </div>
        <strong>${tagData.name}</strong>
        <span>${tagData.servicecategory}</span>
    </div>
  `;
}

// initialize Tagify on the above input node reference
var usrList = new Tagify(inputElm, {
    tagTextProp: "name",
    enforceWhitelist: true,
    skipInvalid: true,
    dropdown: {
        closeOnSelect: false,
        enabled: 0,
        classname: "users-list",
        searchKeys: ["name"],
    },
    templates: {
        tag: tagTemplate,
        dropdownItem: suggestionItemTemplate,
    },
    whitelist: [],
});

usrList.on("dropdown:show dropdown:updated", onDropdownShow);
usrList.on("dropdown:select", onSelectSuggestion);

var addAllSuggestionsElm;

function onDropdownShow(e) {
    var dropdownContentElm = e.detail.tagify.DOM.dropdown.content;

    if (usrList.suggestedListItems.length > 1) {
        if (selectElm.value !== "4") {
            // Verificar si servicecategoryid no es igual a '4'
            addAllSuggestionsElm = getAddAllSuggestionsElm();
            dropdownContentElm.insertBefore(
                addAllSuggestionsElm,
                dropdownContentElm.firstChild
            );
        }
    } else {
        dropdownContentElm.innerHTML = "No whitelist data available.";
    }
}

function onSelectSuggestion(e) {
    if (e.detail.elm == addAllSuggestionsElm) {
        usrList.dropdown.selectAll();
    }
}

function getAddAllSuggestionsElm() {
    return usrList.parseTemplate("dropdownItem", [
        {
            class: "addAll",
            name: "Add all",
            servicecategory:
                usrList.whitelist.reduce(function (remainingSuggestions, item) {
                    return usrList.isTagDuplicate(item.idservice)
                        ? remainingSuggestions
                        : remainingSuggestions + 1;
                }, 0) + " Services",
        },
    ]);
}

function fetchWhitelistData(serviceCategoryId) {
    return fetch(`/getWhitelistData/${serviceCategoryId}`).then(function (
        response
    ) {
        return response.json();
    });
}

var inputElm = document.querySelector("input[name=services_list]");
var selectElm = document.querySelector("select[name=servicecategory_id]");
var singleMode = false; // Variable para seguir el modo actual

// Establecer el evento "dropdown:select" para evitar selección múltiple en modo "single"
usrList.on("dropdown:select", function (e) {
    if (singleMode) {
        usrList.removeAllTags();
        usrList.addTags([e.detail.data]);
        $("#listroutes").html("");
    }
});

selectElm.addEventListener("change", function () {
    var serviceCategoryId = selectElm.value;
    fetchWhitelistData(serviceCategoryId).then(function (data) {
        usrList.settings.whitelist = data;
        usrList.dropdown.hide();

        // Borrar las etiquetas cuando cambia la categoría de servicio
        usrList.removeAllTags();

        if (serviceCategoryId == "4") {
            // Permitir la selección de un solo elemento
            usrList.settings.mode = "single";
            singleMode = true; // Establecer el modo en true
            $("#btnaddlocation").removeClass("d-none");
            $("#btnaddroute").addClass("d-none");
        } else {
            // Permitir la selección múltiple
            usrList.settings.mode = "multi";
            singleMode = false; // Establecer el modo en false
            $("#btnaddlocation").addClass("d-none");
            $("#btnaddroute").removeClass("d-none");
        }

        $("#listroutes").html("");
    });
});

// Resto del código sigue igual...

document
    .getElementById("print_supplier")
    .addEventListener("click", function () {
        const elementToCapture = document.querySelector(".layout-spacing");

        const ignoreElements = function (element) {
            // Retorna true para excluir el elemento con la clase 'dropdown-list'
            return element.classList.contains("dropdown-menu");
        };

        html2canvas(elementToCapture, {
            ignoreElements: ignoreElements,
        }).then(function (canvas) {
            const image = canvas.toDataURL("image/png");

            printJS({
                printable: image,
                type: "image",
                onPrintDialogClose: function () {
                    // Aquí puedes realizar acciones adicionales después de que se cierra el diálogo de impresión
                },
            });
        });
    });
