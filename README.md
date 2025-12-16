# USUARIOS DE PRUEBAS
profesionales
jkriman@gmail.com 12345678
jaimekriman@gmail.com 12345678

Paciente
paciente@gmail.com 123

# ESTADOS DE CONTRATOS DEPENDIENTES
1. Nuevo
2. Activo
3. Vencido
4. Finalizado
5. Anulado

# TIPOS DE CONTRATOS DEPENDIENTES
1. CONTRATO INDEFINIDO
2. CONTRATO DEFINIDO

# DETALLE DE TABLA LIQUIDACION RECIBO (INFO CUENTA BANCARIA)
## liquidacion_recibo = cuentas banco
* id_seccion = id_usuario
* serie  = rut
* autor = nombre
* casa = banco
* numero_control = cuenta
* email = email
* principal = principal (indica si es cuenta principal con 1)
* otro = comodin
* estado = 1|0

# BONOS 
## TIPO DE PAGO (ID CLASE BONO)
* 1->Bono Fisico
* 2->Sencillito
* 3->Caja Vecina
* 4->Bono Web
* 5->Bono Web Pre-Pago
* 6->Particular

# ESTADO DE RENDICIONES 
0. NUEVO
1. EN PROCESO
2. APROBADA
3. RECHAZADA
4. DESISTIDA


# TIPO MENSAJE APP
1. rendicion -> Recibe conforme Rendición de Caja N°{id_rendicion} de la Asistente {nombre_asistente} de fecha {fecha_rendicion}
2. permiso visualizar ficha unica -> El Profesional {nombre_profesional} esta solicitando ver su ficha unica 
3. confirmacion hora medica -> Ud tiene una Hora {evento} por Confirmar, para el dia {fecha} a las {hora} 

# LOG USERS DEVICES "TIPO"
1. RENDICION
2. CONFIRMACION DE HORA

# APP log_users_devices
## ESTADOS log_users_devices
0. ESPERA
1. VALIDO
2. VENCIDO
3. RECHAZADO

## tipo
1. rendicion


# LISTA DE BLADE PARA CORREOS
1.  CORREO PACIENTE AUTORIZACION DE DISPOSITIVO APP -> registrar_app
2.  CORREO PACIENTE HORA AGENDADA -> hora_agendada


# ESTADOS DE HORA DE ATENCION
1.  Reservada -> celeste
2.  CONFIRMADO -> verde
3.  Rechazada -> Rojo
4.  Espera -> morado
5.  Realizando-> rosa
6.  Realizada -> Azul
7.  Inasistida -> naranjo
8.  Llamando -> morado (monitor sala espera)


# NOTIFICACION CONFIRMACION
## TIPOS DE NOTIFICACION CONFIRMACION
1.  HORA MEDICA
2.  OTROS
## ESTADOS DE NOTIFICACION CONFIRMACION
0.  NOTIFICADO
1.  SEGUNDA NOTIFICACION
2.  CONFIRMADO
3.  RECHAZADO
4.  CANCELADO


# LICENCIAS
## TIPOS DE LICENCIAS
1. Tipo 1: enfermedad o accidente común.
2. Tipo 2: medicina preventiva.
3. Tipo 3: pre y postnatal.
4. Tipo 4: enfermedad grave del niño menor del año


# TIPOS DE DOCUMENTOS 
1. RECETA
2. RECETA ESPECIALIDADES
3. EXAMEN
4. EXAMEN ESPECIALIDADES
5. CONSENTIMIENTOS INFORMADOS
6. INFORME DE EXAMENES
7. CERTIFICADO DE REPOSO
8. INTER CONSULTA
9. RESPUESTA INTERCONSULTA
10. INFORM MEDICO
11. CONSTANCIA GES
12. REMBOLSO GASTOS MEDICOS
13. LICENCIA
14. FICHA MEDICA UNICA
15. ORDEN HOSPITALIZACION
17. SOLICITUD DE PABELLON
18. EPICRISIS
19. PROTOCOLO OPERATORIO
20. CARNE DE ALTA
21. CARNE DE VACUNA


/* PROFESIONAL PROVISORIO */
http://medichile_sistema.test/Acceso_Profesional_NI/847e7255aac405a25068034bb47368cf

# ESTADOS EN PROFESIONAL INSTITUCION CONVENIO
1. NUEVO
2. CONFIRMADO
3. RECHAZADO
4. FINALIZADO

# TIPO CONVENIO PORFESIONAL INSTITUCION
1. FIJO
2. VARIABLE


# ESTADO DE RENDICIONES
1. GENERADO
2. PAGADO
3. ELIMINADO

# ESTADO PAGOS INSTITUCION
1. NUEVO
2. PAGADO
3. CANCELADO

# ESTADO HORA ATENCION
1. RESERVADA
2. CONFIRMADO
3. RECHAZADA
4. ESPERA
5. REALIZANDO
6. REALIZADA
7. INASISTIDA
8. LLAMANDO
9. EXAMEN REALIZADO SIN CARGA DE RESULTADO
10. EXAMEN REALIZADO CON CARGA DE RESULTADO
11. EXAMEN TRANSCRITO
12. EXAMEN FINALIZADO

# ESTADO FICHA ATENCION (campo -> finalizada)
0. CONSULTA/EXAMEN PENDIENTE
1. CONSULTA/EXAMEN FINALIZADA
2. EXAMEN PENDIENTE POR TRANSCRIBIR
3. EXAMEN TRANSCRITO

# vet-sdi
