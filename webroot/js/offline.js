const db = new PouchDB('checkin_offline');

function registrarCheckinOffline(inscricaoId) {
    const checkin = {
        _id: new Date().toISOString(),
        inscricao_id: inscricaoId,
        status: 'checked_in',
        sincronizado: false
    };

    db.put(checkin)
        .then(() => {
            alert('Check-in salvo localmente!');
            listarCheckins();
        })
        .catch((err) => console.error('Erro ao salvar check-in offline:', err));
}

function listarCheckins() {
    db.allDocs({ include_docs: true })
        .then((result) => {
            console.log('Check-ins locais:', result.rows);
        })
        .catch((err) => console.error('Erro ao listar check-ins locais:', err));
}

function sincronizarCheckins() {
    db.allDocs({ include_docs: true }).then((result) => {
        result.rows.forEach((row) => {
            const doc = row.doc;
            
            if (!doc.sincronizado) {
                const data = {
                    inscricao_id: doc.inscricao_id,
                    status: doc.status
                };

                fetch('/inscricoes/sync', {
                    method: 'POST',
                    headers: { 
                        'Content-Type': 'application/json',
                        'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify(data)
                })
                .then((res) => res.json())
                .then((response) => {
                    if (response.success) {
                        db.put({ ...doc, sincronizado: true });
                        console.log('Dados sincronizados:', doc._id);
                    } else {
                        console.error('Erro ao sincronizar:', response.message);
                    }
                })
                .catch((err) => console.error('Erro na sincronização:', err));
            }
        });
    });
}
window.registrarCheckinOffline = registrarCheckinOffline;
window.sincronizarCheckins = sincronizarCheckins;