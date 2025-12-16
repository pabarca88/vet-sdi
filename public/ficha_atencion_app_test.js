// =================== DEBUG AUTH:API MIDDLEWARE ===================

// 1. PROBAR RUTA SIN MIDDLEWARE
async function testSinAuth() {
    console.log('🔓 Probando ruta SIN middleware auth:api...');

    try {
        const response = await fetch('https://med-sdi.cl/api/debug-sin-auth', {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        });

        console.log('📡 Status sin auth:', response.status);

        if (response.ok) {
            const result = await response.json();
            console.log('✅ Ruta sin auth funcionando:', result);
        } else {
            const errorText = await response.text();
            console.log('❌ Error ruta sin auth:', response.status, errorText);
        }
    } catch (error) {
        console.error('❌ Error sin auth:', error);
    }
}

// 2. PROBAR RUTA CON MIDDLEWARE auth:api
async function testConAuthApi() {
    const token = '24|FONkF9YGTW2X1AKM2kB99NvtXgW0OjBWMkCRgCrk';

    console.log('🔐 Probando ruta CON middleware auth:api...');

    try {
        const response = await fetch('https://med-sdi.cl/api/debug-con-auth-api', {
            method: 'GET',
            headers: {
                'X-Auth-Token': token,
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        });

        console.log('📡 Status con auth:api:', response.status);

        if (response.ok) {
            const result = await response.json();
            console.log('✅ Middleware auth:api funcionando:', result);
            console.log('👤 Usuario ID:', result.user_id);
        } else {
            const errorText = await response.text();
            console.log('❌ Error con auth:api:', response.status, errorText);

            if (response.status === 401) {
                console.log('🚨 ERROR 401: Middleware auth:api está RECHAZANDO la autenticación');
            } else if (response.status === 404) {
                console.log('🚨 ERROR 404: Middleware auth:api podría estar causando el 404');
            }
        }
    } catch (error) {
        console.error('❌ Error con auth:api:', error);
    }
}

// 3. PROBAR RUTA CON MIDDLEWARE auth:sanctum
async function testConAuthSanctum() {
    const token = '24|FONkF9YGTW2X1AKM2kB99NvtXgW0OjBWMkCRgCrk';

    console.log('🔐 Probando ruta CON middleware auth:sanctum...');

    try {
        const response = await fetch('https://med-sdi.cl/api/debug-con-auth-sanctum', {
            method: 'GET',
            headers: {
                'X-Auth-Token': token,
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        });

        console.log('📡 Status con auth:sanctum:', response.status);

        if (response.ok) {
            const result = await response.json();
            console.log('✅ Middleware auth:sanctum funcionando:', result);
            console.log('👤 Usuario ID:', result.user_id);
        } else {
            const errorText = await response.text();
            console.log('❌ Error con auth:sanctum:', response.status, errorText);
        }
    } catch (error) {
        console.error('❌ Error con auth:sanctum:', error);
    }
}

// 4. PROBAR AUTH PASO A PASO
async function testAuthPasoAPaso() {
    const token = '24|FONkF9YGTW2X1AKM2kB99NvtXgW0OjBWMkCRgCrk';

    console.log('🔍 Probando auth paso a paso...');

    try {
        const response = await fetch('https://med-sdi.cl/api/debug-auth-paso-a-paso', {
            method: 'GET',
            headers: {
                'X-Auth-Token': token,
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        });

        console.log('📡 Status auth paso a paso:', response.status);

        if (response.ok) {
            const result = await response.json();
            console.log('✅ Debug auth paso a paso:', result);

            console.log('🔍 Análisis detallado:');
            console.log('- Headers:', result.resultados.paso1_headers);
            console.log('- auth(\'api\')->check():', result.resultados.paso2_auth_api_check);
            console.log('- auth(\'sanctum\')->check():', result.resultados.paso3_auth_sanctum_check);
            console.log('- auth(\'api\')->user():', result.resultados.paso4_auth_api_user);

        } else {
            const errorText = await response.text();
            console.log('❌ Error auth paso a paso:', response.status, errorText);
        }
    } catch (error) {
        console.error('❌ Error auth paso a paso:', error);
    }
}

// 5. EJECUTAR TODOS LOS TESTS DE AUTH
async function diagnosticarAuth() {
    console.log('🚀 INICIANDO DIAGNÓSTICO COMPLETO DEL MIDDLEWARE AUTH:API');
    console.log('=' .repeat(60));

    console.log('\n1️⃣ Probando ruta sin autenticación...');
    await testSinAuth();

    console.log('\n2️⃣ Probando middleware auth:api...');
    await testConAuthApi();

    console.log('\n3️⃣ Probando middleware auth:sanctum...');
    await testConAuthSanctum();

    console.log('\n4️⃣ Analizando auth paso a paso...');
    await testAuthPasoAPaso();

    console.log('\n🎯 DIAGNÓSTICO COMPLETADO');
    console.log('Si auth:api da 404/401 pero sin auth funciona → Problema con middleware auth:api');
    console.log('Si auth:sanctum funciona pero auth:api no → Usar auth:sanctum en las rutas');
}

// =================== FIN DEBUG AUTH:API MIDDLEWARE ===================

// Función para probar la creación de una ficha de atención (sin autenticación)
async function testFichaAtencionApp() {
    console.log('🏥 Probando creación de ficha de atención...');

    const datosFicha = {
        id_paciente: "3",
        rut_profesional: "17.174.188-2",
        nombre_profesional: "francisco rojo",
        correo_profesional: "francisco@gmail.com",
        telefono_profesional: "56932659812d",
        especialidad: null,
        tipo_especialidad: null,
        sub_tipo_especialidad: null,
        diagnosticos: "qwdwq",
        examenes: "examenes",
        medicamentos: "aspirina",
        rut_dependiente: null,
        token: "app-token-" + Date.now()
    };

    try {
        const response = await fetch('/api/test-ficha-atencion-app', {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(datosFicha)
        });

        console.log('📡 Status test ficha:', response.status);

        if (response.ok) {
            const result = await response.json();
            console.log('✅ Ficha creada exitosamente:', result);

            if (result.success) {
                console.log('🎉 ¡FICHA DE ATENCIÓN CREADA!');
                console.log('🆔 ID:', result.data.id);
                console.log('👤 Paciente:', result.data.id_paciente);
                console.log('👨‍⚕️ Profesional:', result.data.nombre_profesional);
                console.log('🏷️ Token:', result.data.token);
            }
        } else {
            const errorText = await response.text();
            console.log('❌ Error creando ficha:', response.status, errorText);
        }
    } catch (error) {
        console.error('❌ Error test ficha:', error);
    }
}

// Función para probar la API autenticada de fichas
async function testFichaAtencionAppConAuth() {
    const token = '24|FONkF9YGTW2X1AKM2kB99NvtXgW0OjBWMkCRgCrk';

    console.log('🔐 Probando API autenticada de fichas...');

    const datosFicha = {
        id_paciente: "3",
        rut_profesional: "17.174.188-2",
        nombre_profesional: "francisco rojo",
        correo_profesional: "francisco@gmail.com",
        telefono_profesional: "56932659812d",
        diagnosticos: "Diagnóstico desde app móvil",
        examenes: "Exámenes solicitados desde app",
        medicamentos: "Medicamentos recetados desde app",
        token: "auth-app-token-" + Date.now()
    };

    try {
        const response = await fetch('/api/ficha-atencion-app', {
            method: 'POST',
            headers: {
                'X-Auth-Token': token,
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(datosFicha)
        });

        console.log('📡 Status ficha autenticada:', response.status);

        if (response.ok) {
            const result = await response.json();
            console.log('✅ Ficha autenticada creada:', result);
        } else {
            const errorText = await response.text();
            console.log('❌ Error ficha autenticada:', response.status, errorText);
        }
    } catch (error) {
        console.error('❌ Error ficha autenticada:', error);
    }
}

// Función para obtener fichas por paciente (autenticada)
async function getFichasPorPaciente(idPaciente = '3') {
    const token = '24|FONkF9YGTW2X1AKM2kB99NvtXgW0OjBWMkCRgCrk';

    console.log(`📋 Obteniendo fichas del paciente ${idPaciente}...`);

    try {
        const response = await fetch(`/api/ficha-atencion-app/paciente/${idPaciente}`, {
            method: 'GET',
            headers: {
                'X-Auth-Token': token,
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        });

        console.log('📡 Status fichas paciente:', response.status);

        if (response.ok) {
            const result = await response.json();
            console.log('✅ Fichas del paciente:', result);

            if (result.success && result.data.length > 0) {
                console.log(`📊 Se encontraron ${result.data.length} fichas`);
                result.data.forEach((ficha, index) => {
                    console.log(`📄 Ficha ${index + 1}:`, {
                        id: ficha.id,
                        profesional: ficha.nombre_profesional,
                        fecha: ficha.created_at,
                        token: ficha.token
                    });
                });
            } else {
                console.log('📭 No se encontraron fichas para este paciente');
            }
        } else {
            const errorText = await response.text();
            console.log('❌ Error obteniendo fichas:', response.status, errorText);
        }
    } catch (error) {
        console.error('❌ Error fichas paciente:', error);
    }
}

console.log(`
🏥 API Ficha de Atención App - Funciones de Prueba
===============================================

📋 FUNCIONES DISPONIBLES:

🚨 DIAGNÓSTICO MIDDLEWARE AUTH:API:
- diagnosticarAuth() - 🆕 EJECUTAR DIAGNÓSTICO COMPLETO DEL MIDDLEWARE
- testSinAuth() - Probar ruta sin middleware (debe funcionar)
- testConAuthApi() - Probar middleware auth:api (puede dar 404/401)
- testConAuthSanctum() - Probar middleware auth:sanctum (alternativa)
- testAuthPasoAPaso() - Análisis detallado paso a paso

🧪 Tests Básicos:
- testFichaAtencionApp() - Crear ficha sin autenticación (prueba)
- testFichaAtencionAppConAuth() - Crear ficha con autenticación

📊 Consultas:
- getFichasPorPaciente(idPaciente) - Obtener fichas por paciente

🔗 URLs de la API:
- POST /api/paciente/ficha-atencion-app - Crear ficha (requiere auth)
- GET /api/paciente/ficha-atencion-app/{id} - Fichas por paciente
- GET /api/paciente/ficha-atencion-app/profesional/{rut} - Fichas por profesional
- GET /api/paciente/ficha-atencion-app/token/{token} - Ficha por token
- PUT /api/paciente/ficha-atencion-app/{id} - Actualizar ficha
- DELETE /api/paciente/ficha-atencion-app/{id} - Desactivar ficha

� PROBLEMA ACTUAL: ERROR 404 EN RUTAS CON auth:api
- Es probable que el middleware auth:api esté fallando y causando el 404

🔥 DIAGNÓSTICO INMEDIATO:
1. Ejecuta: diagnosticarAuth()
2. Observa si testConAuthApi() da 404/401
3. Compara con testConAuthSanctum()

===============================================
`);
