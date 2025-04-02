import React from 'react';

export const ReactThing = ({ test }) => {
    return (
        <div>
            <p>React Thing: {test}</p>
        </div>
    );
}

export const AnotherReactThing = ({ says }) => {
    return (
        <div>
            <p>Another React Thing says: {says}</p>
        </div>
    );
}
