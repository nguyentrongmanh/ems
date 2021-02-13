$(document).ready(function() {
    // đóng máy cắt
    $(".close-CB-button").on("click", function() {
        let CBcode = $('#circuit-breaker-modal').attr("data-CB-code")
        let data = {
            status: 0,
            code: CBcode
        };
        message = new Paho.MQTT.Message(JSON.stringify(data));
        message.destinationName = "Received";
        client.send(message);
    })
    //mở máy cắt
    $(".open-CB-button").on("click", function() {
        let CBcode = $('#circuit-breaker-modal').attr("data-CB-code")
        let data = {
            status: 1,
            code: CBcode
        };
        message = new Paho.MQTT.Message(JSON.stringify(data));
        message.destinationName = "Received";
        client.send(message);
    })
    // đóng dao cách ly
    $(".close-DS-button").on("click", function() {
        let DScode = $('#disconnector-switch-modal').attr("data-DS-code")
        let data = {
            status: CLOSE,
            code: DScode
        };
        message = new Paho.MQTT.Message(JSON.stringify(data));
        message.destinationName = "Received";
        client.send(message);
    })
    //mở dao cách ly
    $(".open-DS-button").on("click", function() {
        let DScode = $('#disconnector-switch-modal').attr("data-DS-code")
        let data = {
            status: OPEN,
            code: DScode
        };
        message = new Paho.MQTT.Message(JSON.stringify(data));
        message.destinationName = "Received";
        client.send(message);
    })

    $('.confirm-protection-btn').on('click', function() {
        pauseAudio();
        $.modal.close();
    })

    $(".circuit-breaker-element").on("click", function() {
        let circuitBreakerId = $(this).attr("id")
        switch (circuitBreakerId) {
            case "TBABA_131_CB":
                check131CircuitBreakerCondition()
                break;
            case "TBABA_171_CB":
                check171CircuitBreakerCondition()
                break;
            default:
                break;
        }
        $('#circuit-breaker-modal').attr("data-CB-code", circuitBreakerId)
        $('#circuit-breaker-modal').modal({});
    });

    $(".disconnectors-switches-element").on("click", function() {
        let disconnectorSwitchId = $(this).attr("id")
        switch (disconnectorSwitchId) {
            case "TBABA_131_3_DS":
                check131_3DisconnectorSwitchCondition()
                break;
            case "TBABA_131_1_DS":
                check131_1DisconnectorSwitchCondition()
                break;
            case "TBABA_171_1_DS":
                check171_1DisconnectorSwitchCondition()
                break;
            case "TBABA_171_7_DS":
                check171_1DisconnectorSwitchCondition()
                break;
            default:
                break;
        }
        $('#disconnector-switch-modal').attr("data-DS-code", disconnectorSwitchId)
        $('#disconnector-switch-modal').modal({});
    });

    $(".earth-breaker-element").on("click", function() {
        let disconnectorSwitchId = $(this).attr("id")
        switch (disconnectorSwitchId) {
            case "TBABA_131_15_EB":
                check131_15EarthBreakerCondition()
                break;
            case "TBABA_131_35_EB":
                check131_35EarthBreakerCondition()
                break;
            case "TBABA_131_38_EB":
                check131_38EarthBreakerCondition()
                break;
            case "TBABA_171_15_EB":
                check171_15EarthBreakerCondition()
                break;
            case "TBABA_171_14_EB":
                check171_14EarthBreakerCondition()
                break;
            case "TBABA_171_75_EB":
                check171_75EarthBreakerCondition()
                break;
            case "TBABA_171_76_EB":
                check171_76EarthBreakerCondition()
                break;
            default:
                break;
        }
        $('#earth-breaker-modal').attr("data-EB-code", disconnectorSwitchId)
        $('#earth-breaker-modal').modal({});
    });
})