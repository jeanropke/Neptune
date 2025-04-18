var HabboClientUtils = {
    options: {},
    init: function(A) {
        HabboClientUtils.options = Object.extend({
            remoteCallsEnabled: true
        }, A || {});
        Event.observe(window, "load", resizeWin);
        Event.observe(window, "error", function(B) {
            Event.stop(B);
            return true
        });
        Event.observe(window, "unload", clearOpener);
        ensureOpenerIsLoggedIn();
        addClientUnloadHook();
        Event.observe(document, "keypress", function(B) {
            if (B.keyCode == Event.KEY_BACKSPACE) {
                Event.stop(B)
            }
        })
    },
    cacheCheck: function() {
        if (HabboClientUtils.options.remoteCallsEnabled) {
            new Ajax.Request(habboReqPath + "/cacheCheck", {
                onComplete: function(A) {
                    if (A.responseText == "false") {
                        window.location.href = habboReqPath + "/client?" + new Date().getTime()
                    }
                }
            })
        }
    },
    extWrite: function(A) {
        document.write(A)
    },
    loaderTimeout: 10000,
    showLoader: function(A) {
        var C = {
            height: "1px"
        };
        if (!Prototype.Browser.IE) {
            C.visibility = "hidden"
        }
        $("clientembed").setStyle(C);
        $("clientembed-loader").show();
        HabboClientUtils.loaderIdx = A.length;
        var B = $("clientembed-loader").select("div b").first();
        HabboClientUtils.timer = window.setInterval(function() {
            B.innerHTML = A[HabboClientUtils.loaderIdx % A.length];
            HabboClientUtils.loaderIdx++
        }, 800);
        HabboClientUtils.loaderTimeoutTimer = window.setTimeout(function() {
            HabboClientUtils.hideLoader()
        }, HabboClientUtils.loaderTimeout)
    },
    hideLoader: function() {
        $("clientembed-loader").hide();
        $("clientembed").setStyle({
            visibility: "visible",
            height: "540px"
        });
        if (!!HabboClientUtils.timer) {
            window.clearInterval(HabboClientUtils.timer)
        }
        if (!!HabboClientUtils.loaderTimeout) {
            window.clearTimeout(HabboClientUtils.loaderTimeout)
        }
    },
    clientPageLog: function() {
        var B = {};
        var A = determineSWVersion();
        if (A != "undefined") {
            B.javascriptVersion = A
        }
        B.osVersion = this.determineSimpleOSVersion();
        if (HabboClientUtils.options.remoteCallsEnabled) {
            new Ajax.Request(habboReqPath + "/clientlog/clientpage", {
                method: "post",
                parameters: B
            })
        }
    },
    determineSimpleOSVersion: function() {
        return navigator.platform + "/" + navigator.oscpu
    },
    logClientJavascriptError: function(A) {
        var B = A;
        if (Prototype.Browser.Gecko) {
            B += " (" + A.fileName + ":" + A.lineNumber + ")"
        }
        if (Prototype.Browser.IE) {
            B += " (" + A.name + ":" + A.message + ")"
        }
        if (HabboClientUtils.options.remoteCallsEnabled) {
            new Ajax.Request(habboReqPath + "/clientlog/jsexception", {
                method: "post",
                parameters: {
                    exceptionMessage: B
                }
            })
        }
    }
};

function resizeWin() {
    if (!document.all || screen.height > 600) {
        if (document.all) {
            document.all["client-topbar"].style.display = "block"
        } else {
            if (document.getElementById) {
                document.getElementById("client-topbar").style.display = "block"
            }
        }
    }
    if (window.opener != null) {
        var A = Utils.getPageSize();
        if (Prototype.Browser.IE) {
            if (typeof document.body.style.maxHeight == "undefined") {
                A[0] = (screen.width >= 990 ? 960 : 720);
                A[1] += 35
            } else {
                A[0] = (screen.width >= 990 ? 990 : 750);
                A[1] += 55
            }
        }
        try {
            window.resizeTo(A[0], A[1])
        } catch (B) {}
        window.setTimeout(function() {
            var C = Utils.getPageSize();
            C[0] = (screen.width >= 990 ? 960 : 720);
            try {
                window.resizeBy(C[0] - C[2], C[1] - C[3])
            } catch (D) {}
        }, 500)
    }
}
var HabboCounter = {

    init: function(A) {
        this.refreshFrequency = A;
        this.start();
        this.lastValue = "0";
    },
    start: function() {
        new PeriodicalExecuter(this.onTimerEvent.bind(this), this.refreshFrequency)
    },
    onTimerEvent: function() {
        new Ajax.Request("/habblet/ajax/updateHabboCount", {
            onSuccess: function(A, B) {
                if (B && typeof B.habboCountText != "undefined" && this.lastValue != B.habboCountText) {
                    new Effect.Fade("habboCountUpdateParent", {
                        duration: 0.5,
                        afterFinish: function() {
                            Element.update("habboCountUpdateTarget", B.habboCountText);
                            new Effect.Appear("habboCountUpdateParent", {
                                duration: 0.5
                            })
                        }
                    });
                    this.lastValue = B.habboCountText
                }
            }
        })
    }
};

function addClientUnloadHook() {
    if (habboClient == true && determineSWVersion() != "undefined") {
        Event.observe(window, "unload", function() {
            new Ajax.Request(habboReqPath + "/account/unloadclient", {
                parameters: {
                    windowName: HabboClient.windowName
                },
                asynchronous: false
            })
        })
    }
}

function clearOpener() {
    if (window.opener && window.opener.openedHabbo) {
        window.opener.openedHabbo = null
    }
}
var ClientMessageHandler = {
    call: function(C, B) {
        if (!!C) {
            var A = C.split(/,+/).without("").uniq();
            A.each(function(E) {
                if (E.length > 0 && typeof ClientMessageHandler[E] == "function") {
                    try {
                        ClientMessageHandler[E].apply(null, [B])
                    } catch (D) {}
                }
            })
        }
    },
    googleClientKeepAlive: null,
    googleLastTrackingCall: 0,
    google: function(B) {
        if (!ClientMessageHandler.googleClientKeepAlive) {
            ClientMessageHandler.googleClientKeepAlive = window.setInterval(function() {
                var C = new Date().getTime();
                if (ClientMessageHandler.googleLastTrackingCall < C - 15 * 60 * 1000) {
                    ClientMessageHandler.google("/client/keepalive");
                    ClientMessageHandler.googleLastTrackingCall = C
                }
            }, 10 * 60 * 1000)
        }
        var A = B.replace(/^(.*?\/){3}/, "/").replace(/^\/client(?=\/)/, "");
        if (window.pageTracker) {
            pageTracker._trackPageview("/client" + A)
        }
    },
    nielsen: function(A) {
        ClientMessageHandler.url("http://secure-dk.imrworldwide.com/cgi-bin/m?ci=Habbohotel&cg=0&si=" + A)
    },
    customjs: function(A) {
        if (ClientMessageHandler.custom) {
            ClientMessageHandler.custom(A)
        }
    },
    url: function(B) {
        var A = new Image(1, 1);
        A.src = B
    },
    hello: function(A) {
        alert(A)
    },
    clientInit: function(B) {
        ClientInitTimer.stop();
        if (B) {
            var A = determineSWVersion();
            if (A != "undefined") {
                B.javascriptVersion = A
            }
            B.osVersion = HabboClientUtils.determineSimpleOSVersion();
            B.initTime = ClientInitTimer.initEnd - ClientInitTimer.initStart;
            if (HabboClientUtils.options.remoteCallsEnabled) {
                new Ajax.Request(habboReqPath + "/clientlog/init", {
                    method: "post",
                    parameters: B
                })
            }
        }
        B.osVersion = HabboClientUtils.determineSimpleOSVersion();
        B.initTime = ClientInitTimer.initEnd - ClientInitTimer.initStart;
        new Ajax.Request(habboReqPath + "/clientlog/init", {
            method: "post",
            parameters: B
        })
    },
    clientReady: function(A) {
        HabboClientUtils.hideLoader();
        window.scrollTo(0, Utils.getPageSize()[1])
    },
    friendListUpdate: function() {
        Cookie.set("friendlist", "up")
    }
};
var ClientInitTimer = {
    timeoutId: null,
    hasClientLoadingFailed: false,
    initStart: 0,
    initEnd: 0,
    start: function(A) {
        if (ClientInitTimer.timeoutId) {
            clearTimeout(ClientInitTimer.timeoutId)
        }
        ClientInitTimer.initStart = new Date().getTime();
        ClientInitTimer.timeoutId = setTimeout(ClientInitTimer.timeout, A)
    },
    stop: function() {
        ClientInitTimer.initEnd = new Date().getTime();
        clearTimeout(ClientInitTimer.timeoutId);
        ClientInitTimer.timeoutId = null
    },
    timeout: function() {
        var B = "?error=client_timeout";
        var A = determineSWVersion();
        if (A != "undefined") {
            B += "&version=" + encodeURIComponent(A)
        }
        if (ClientInitTimer.hasClientLoadingFailed) {
            document.location = "/client_failed_again" + B
        } else {
            document.location = "/client_failed" + B
        }
    }
};

function log(A) {
    if (HabboClientUtils.options.remoteCallsEnabled) {
        new Ajax.Request(habboReqPath + "/clientlog/update", {
            parameters: {
                step: A
            }
        })
    }
}
var ShockwaveInstallation = {
    init: function() {
        ShockwaveInstallation.detectionFile = ShockwaveInstallation.detectionFile || null;
        ShockwaveInstallation.cabVersion = ShockwaveInstallation.cabVersion || null;
        ShockwaveInstallation.playerVersion = ShockwaveInstallation.playerVersion || null;
        ShockwaveInstallation.clientURL = ShockwaveInstallation.clientURL || null;
        var A = Cookie.get("shockwave_install");
        if (A) {
            Cookie.erase("shockwave_install");
            ShockwaveInstallation.startSwInstallation()
        } else {
            Cookie.set("shockwave_install", "install", "1")
        }
    },
    swDetectionCheck: function() {
        if (determineSWVersion() == "undefined") {
            if (Cookie.get("shockwave_install")) {
                Cookie.erase("shockwave_install")
            }
            document.location = habboReqPath + "/client_popup/install_shockwave";
            return false
        } else {
            if (ShockwaveInstallation.getSwVersionNumber() < 10) {
                document.location = habboReqPath + "/client_popup/upgrade_shockwave";
                return false
            }
        }
        return true
    },
    getSwVersionNumber: function() {
        var A = determineSWVersion();
        if (A != "undefined") {
            var C = A.indexOf(".");
            var B = A.substring(C - 2, C + 2);
            return parseFloat(B)
        }
        return 0
    },
    shockwaveDetected: function() {
        var A = determineSWVersion();
        if (A != "undefined" && ShockwaveInstallation.getSwVersionNumber() >= 10) {
            if (Cookie.get("shockwave_install")) {
                Cookie.erase("shockwave_install")
            }
            document.location = habboReqPath + "/client"
        }
    },
    embedInstallationMovie: function() {
        var B = ShockwaveInstallation.playerVersion == null ? "" : '<param name="playerVersion" value="' + ShockwaveInstallation.playerVersion + '" />';
        var C = ShockwaveInstallation.playerVersion == null ? "" : ' playerVersion="' + ShockwaveInstallation.playerVersion + '"';
        var A = '<object classid="clsid:166B1BCA-3F9C-11CF-8075-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/director/sw.cab#version=' + ShockwaveInstallation.cabVersion + '" id="swdetect" width="600" height="300">' + B + '<param name="src" value="' + ShockwaveInstallation.detectionFile + '"><param name="sw1" value="' + ShockwaveInstallation.clientURL + '"><param name="swStretchStyle" value="none"><param name="swRemote" value=\'swSaveEnabled="true" swVolume="true" swRestart="true" swPausePlay="true" swFastForward="true" swContextMenu="true"\'>\n<embed src="' + ShockwaveInstallation.detectionFile + '" bgColor="#FFFFFF" width="600" height="300" swStretchStyle="none" sw1="' + ShockwaveInstallation.clientURL + '" swRemote=\'swSaveEnabled="true" swVolume="true" swRestart="true" swPausePlay="true" swFastForward="true" swContextMenu="true"\' ' + C + 'type="application/x-director" pluginspage="http://www.macromedia.com/shockwave/download/"></embed></object>';
        $("swdetection").innerHTML = A
    },
    startSwInstallation: function() {
        $("shockwave-install-button").style.display = "none";
        $("shockwave-install-progressbar").style.display = "block";
        ShockwaveInstallation.embedInstallationMovie()
    },
    startSwDetectionTimer: function() {
        ShockwaveInstallation.shockwaveDetected();
        setTimeout(ShockwaveInstallation.startSwDetectionTimer, 3000)
    },
    installComplete: function() {
        if (Cookie.get("shockwave_install")) {
            Cookie.erase("shockwave_install")
        }
        document.location = habboReqPath + "/client"
    }
};

function determineSWVersion() {
    if (navigator.plugins) {
        navigator.plugins.refresh(false)
    }
    if (navigator.mimeTypes && navigator.mimeTypes["application/x-director"] && navigator.mimeTypes["application/x-director"].enabledPlugin) {
        if (navigator.plugins && navigator.plugins["Shockwave for Director"] && (tVersionIndex = navigator.plugins["Shockwave for Director"].description.indexOf(".")) != -1) {
            return navigator.plugins["Shockwave for Director"].description.substring(tVersionIndex - 2, tVersionIndex + 2)
        }
    } else {
        try {
            var A = new ActiveXObject("SWCtl.SWCtl");
            if (A) {
                return A.ShockwaveVersion("")
            }
        } catch (B) {}
    }
    return "undefined"
};
